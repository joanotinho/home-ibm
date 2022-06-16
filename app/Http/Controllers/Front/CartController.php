<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\DB\Cart;
use Debugbar;

class CartController extends Controller
{
    public function index()
    {
        $view = View::make('front.pages.cart.index');

        if(request()->ajax()) {

            $sections = $view->renderSections();

            return response()->json([
                'content' => $sections['content'],
            ]);
        }
        
        return $view;
    }

    public function store()
    {
        
        for($i = 0; $i < count($_GET['amount']); $i++) {
                    
            $cart = Cart::create([
                'id' => request('id'),
                'price_id' => request('price_id'),
                'fingerprint_id' => null,
                'customer_id' => null,
                'sale_id' => null,
                'active' => 1,
            ]);
        }

        $sections = View::make('front.pages.cart.index')->renderSections();

        return response()->json([
            'content' => $sections['content'],
        ]);
    }
}
