<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\DB\Checkout;
use App\Http\Requests\Front\CheckoutRequest;

class checkoutController extends Controller
{
    public function index()
    {
        $view = View::make('front.pages.checkout.index');

        if(request()->ajax()) {

            $sections = $view->renderSections();

            return response()->json([
                'product' => $sections['content'],
            ]);
        }
        
        return $view;
    }
}
