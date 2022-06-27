<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Cart;
use Debugbar;

class CartController extends Controller
{
    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $view = View::make('front.pages.cart.index')
        ->with('products', $this->cart->get());

        if(request()->ajax()) {

            $sections = $view->renderSections();

            return response()->json([
                'content' => $sections['content'],
            ]);
        }
        
        return $view;
    }

    public function store(Request $request)
    {
        $amount = request('amount');
        
        for($i = 0; $i < $amount; $i++) {
                    
            $cart = Cart::create([
                'id' => request('id'),
                'price_id' => request('price_id'),
                'fingerprint' => $request->cookie('fp'),
                'customer_id' => null,
                'active' => 1,
            ]);
        }

        $carts = $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
        ->groupByRaw('price_id')
        ->where('active', 1)
        ->where('fingerprint',  $request->cookie('fp'))
        ->where('sale_id', null)
        ->orderBy('price_id', 'desc')
        ->get();

        $totals = $this->cart
        ->where('carts.fingerprint', 1)
        ->where('carts.active', 1)
        ->where('carts.sale_id', null)
        ->join('prices', 'prices.id', '=', 'carts.price_id')
        ->join('taxes', 'taxes.id', '=', 'prices.tax_id')
        ->select(DB::raw('sum(prices.base_price) as base_total'), DB::raw('sum(prices.base_price * taxes.multiplier) as total') )
        ->first();

        $sections = View::make('front.pages.cart.index')
        ->with('carts', $carts)
        ->with('base_total', $totals->base_total)
        ->with('tax_total', ($totals->total - $totals->base_total))
        ->with('total', $totals->total)
        ->renderSections();

        return response()->json([
            'content' => $sections['content'],
        ]);
    }

    public function plus($price_id, Request $request)
    {
        $cart = $this->cart->create([
            'price_id' => $price_id,
            'fingerprint' => $request->cookie('fp'),
            'active' => 1,
        ]);

        $carts = $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
        ->groupByRaw('price_id')
        ->where('active', 1)
        ->where('fingerprint',  $request->cookie('fp'))
        ->where('sale_id', null)
        ->orderBy('price_id', 'desc')
        ->get();

        $totals = $this->cart
        ->where('carts.fingerprint', $request->cookie('fp'))
        ->where('carts.active', 1)
        ->where('carts.sale_id', null)
        ->join('prices', 'prices.id', '=', 'carts.price_id')
        ->join('taxes', 'taxes.id', '=', 'prices.tax_id')
        ->select(DB::raw('sum(prices.base_price) as base_total'), DB::raw('sum(prices.base_price * taxes.multiplier) as total') )
        ->first();

        $sections = View::make('front.pages.cart.index')
        ->with('carts', $carts)
        ->with('base_total', $totals->base_total)
        ->with('tax_total', ($totals->total - $totals->base_total))
        ->with('total', $totals->total)
        ->renderSections();

        return response()->json([
            'content' => $sections['content'],
        ]);
    }

    public function minus($price_id, Request $request)
    {
        $product = $this->cart
        ->where('active', 1)
        ->where('fingerprint', $request->cookie('fp'))
        ->where('price_id', $price_id)
        ->first();

        $product->active = 0;
        $product->save();
        
        $carts = $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
        ->groupByRaw('price_id')
        ->where('active', 1)
        ->where('fingerprint',  $request->cookie('fp'))
        ->where('sale_id', null)
        ->orderBy('price_id', 'desc')
        ->get();

        $totals = $this->cart
        ->where('carts.fingerprint', $request->cookie('fp'))
        ->where('carts.active', 1)
        ->where('carts.sale_id', null)
        ->join('prices', 'prices.id', '=', 'carts.price_id')
        ->join('taxes', 'taxes.id', '=', 'prices.tax_id')
        ->select(DB::raw('sum(prices.base_price) as base_total'), DB::raw('sum(prices.base_price * taxes.multiplier) as total') )
        ->first();

        $sections = View::make('front.pages.cart.index')
        ->with('carts', $carts)
        ->with('base_total', $totals->base_total)
        ->with('tax_total', ($totals->total - $totals->base_total))
        ->with('total', $totals->total)
        ->renderSections();

        return response()->json([
            'content' => $sections['content'],
        ]);
    }
}
