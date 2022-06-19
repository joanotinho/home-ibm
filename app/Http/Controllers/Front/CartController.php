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
                'active' => 1,
            ]);
        }

        $carts = $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
        ->groupByRaw('price_id')
        ->where('fingerprint', 1)
        ->get();

        $sections = View::make('front.pages.cart.index')
        ->with('carts', $carts)
        ->renderSections();

        return response()->json([
            'content' => $sections['content'],
        ]);
    }
}
