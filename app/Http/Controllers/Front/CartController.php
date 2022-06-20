<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DB\Cart;
use Request;
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
                'fingerprint' => 1,
                'customer_id' => null,
                'active' => 1,
            ]);
        }

        $carts = $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
        ->groupByRaw('price_id')
        ->where('active', 1)
        ->where('fingerprint', 1)
        ->orderBy('price_id', 'desc')
        ->get();

        $sections = View::make('front.pages.cart.index')
        ->with('carts', $carts)
        ->with('fingerprint', $cart->fingerprint)
        ->renderSections();

        return response()->json([
            'content' => $sections['content'],
        ]);
    }

    public function plus($fingerprint, $price_id)
    {
        $cart = $this->cart->create([
            'price_id' => $price_id,
            'fingerprint' => $fingerprint,
            'active' => 1,
        ]);

        $carts = $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
        ->groupByRaw('price_id')
        ->where('active', 1)
        ->where('fingerprint',  $fingerprint)
        ->orderBy('price_id', 'desc')
        ->get();

        $sections = View::make('front.pages.cart.index')
        ->with('carts', $carts)
        ->with('fingerprint', $cart->fingerprint)
        ->renderSections();

        return response()->json([
            'content' => $sections['content'],
        ]);
    }

    public function minus($fingerprint, $price_id)
    {
      
        $product = $this->cart
        ->where('active', 1)
        ->where('fingerprint', $fingerprint)
        ->where('price_id', $price_id)
        ->first();

        $product->active = 0;
        $product->save();

        $carts = $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
        ->groupByRaw('price_id')
        ->where('active', 1)
        ->where('fingerprint',  $fingerprint)
        ->orderBy('price_id', 'desc')
        ->get();

        $sections = View::make('front.pages.cart.index')
        ->with('carts', $carts)
        ->with('fingerprint', $fingerprint)
        ->renderSections();

        return response()->json([
            'content' => $sections['content'],
        ]);
    }
}
