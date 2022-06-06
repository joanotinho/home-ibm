<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\DB\Cart;

class cartController extends Controller
{
    public function index()
    {
        $view = View::make('front.pages.cart.index');

        return $view;
    }
}
