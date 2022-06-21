<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
// use App\Http\Requests\Front\CheckoutRequest;
use Debugbar;

class checkoutController extends Controller
{
    public function index()
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
