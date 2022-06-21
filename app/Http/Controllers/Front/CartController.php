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

<<<<<<< HEAD
        $total_base = 0;
        $total_tax = 0;
=======
        $total = $this->cart->price()->select(DB::raw('sum(base_price) as total'))->where('active', 1)->first();

>>>>>>> f8be626375f960114e058ab514b108c7c036f056

        $sections = View::make('front.pages.cart.index')
        ->with('carts', $carts)
        ->with('fingerprint', $cart->fingerprint)
<<<<<<< HEAD
        ->with('total_base', $total_base)
        ->with('total_tax', $total_tax)
=======
        ->with('total', $total)
>>>>>>> f8be626375f960114e058ab514b108c7c036f056
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

        $total_base = 0;
        $total_tax = 0;

        $carts = $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
        ->groupByRaw('price_id')
        ->where('active', 1)
        ->where('fingerprint',  $fingerprint)
        ->orderBy('price_id', 'desc')
        ->get();

        $sections = View::make('front.pages.cart.index')
        ->with('carts', $carts)
        ->with('fingerprint', $cart->fingerprint)
        ->with('total_base', $total_base)
        ->with('total_tax', $total_tax)
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

        $total_base = 0;
        $total_tax = 0;

        $carts = $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
        ->groupByRaw('price_id')
        ->where('active', 1)
        ->where('fingerprint',  $fingerprint)
        ->orderBy('price_id', 'desc')
        ->get();

        $sections = View::make('front.pages.cart.index')
        ->with('carts', $carts)
        ->with('fingerprint', $fingerprint)
        ->with('total_base', $total_base)
        ->with('total_tax', $total_tax)
        ->renderSections();

        return response()->json([
            'content' => $sections['content'],
        ]);
    }

    public function show() 
    {
        $view = View::make('front.pages.checkout.index');

        if(request()->ajax()) {

            $sections = $view->renderSections();
            
            return response()->json([
                'content' => $sections['content'],
            ]);
        }

        return $view;
    }
}
