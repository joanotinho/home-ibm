<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $view = View::make('front.pages.home.index');

        return $view;
    }
}
