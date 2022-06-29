<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DB\Sale;
use App\Models\DB\Cart;
use Debugbar;

class CheckoutController extends Controller
{
    protected $sale;

    public function __construct(Sale $sale, Cart $cart)
    {
        $this->sale = $sale;
        $this->cart = $cart;
    }
   
    public function index()
    {

        $view = View::make('admin.pages.checkout')
            ->with('sale', $this->sale)
            ->with('sales', $this->sale->where('active', 1)
            ->get());

        if(request()->ajax()) {
           
            $sections = $view->renderSections();
   
            return response()->json([
                'table' => $sections['table'],
                'form' => $sections['form'],
            ]);
        }

        return $view;
    }

    public function edit(Sale $sale)
    {
        $carts = $this->cart
        ->groupByRaw('price_id')
        ->where('active', 1)
        ->where('sale_id', $sale->id)
        ->select(DB::raw('count(price_id) as quantity'),'price_id')
        ->get();

        $view = View::make('admin.pages.checkout')
        ->with('sale', $sale)
        ->with('carts', $carts)
        ->with('sales', $this->sale->where('active', 1)->get())
        ;

        if(request()->ajax()) {

            $sections = $view
            ->renderSections();
   
            return response()->json([
                'form' => $sections['form'],
            ]);
        }
               
        return $view;
    }
}
