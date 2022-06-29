<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CheckoutRequest;
use App\Models\DB\Sale;
use App\Models\DB\Customer;
use App\Models\DB\Cart;
use App\Models\DB\Fingerprint;
use Debugbar;

class CheckoutController extends Controller
{
    public function __construct(Sale $sale, Customer $customer, Cart $cart, Fingerprint $fingerprint)
    {
        $this->sale = $sale;
        $this->customer = $customer;
        $this->cart = $cart;
        $this->fingerprint = $fingerprint;
    }

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
    
    public function store(CheckoutRequest $request)
    {

        $totals = $this->cart
        ->where('carts.fingerprint', $request->cookie('fp'))
        ->where('carts.active', 1)
        ->where('carts.sale_id', null)
        ->join('prices', 'prices.id', '=', 'carts.price_id')
        ->join('taxes', 'taxes.id', '=', 'prices.tax_id')
        ->select(DB::raw('sum(prices.base_price) as base_total'), DB::raw('sum(prices.base_price * taxes.multiplier) as total') )
        ->first();

        $sale = $this->sale->latest()->first();

        if(isset($sale->ticket_number) && str_contains($sale->ticket_number, date('Ymd'))) {
            $sale->ticket_number += 1;
        } else {
            $sale->ticket_number = date('Ymd') . '0000';
        }

        
        $customer = $this->customer->create([
            'name' => request('name'),
            'surnames' => request('surnames'),
            'company' => request('company'),
            'country' => request('country'),
            'province' => request('province'),
            'address' => request('address'),
            'extra_address' => request('extra_address'),
            'city' => request('city'),
            'postal_code' => request('postal_code'),
            'phonenumber' => request('phonenumber'),
            'email' => request('email'),
            'active' => 1,
            'visible' => 1,
        ]);

        $sale = $this->sale->create([
            'customer_id' => $customer->id,
            'total_base_price' => $totals->base_total,
            'total_tax_price' => $totals->total - $totals->base_total,
            'total_price' => $totals->total,
            'payment_method_id' => request('paymentmethod'),
            'ticket_number' => $sale->ticket_number,
            'date_emission' => date('Y-m-d'),
            'time_emission' => date('H:i:s'),
            'active' => 1,
        ]);
        
        $carts = $this->cart->where('sale_id', null)->where('fingerprint', $request->cookie('fp'))->where('active', 1)->update([
            'customer_id' => $customer->id,
            'sale_id' => $sale->id,
        ]);

        $fingerprint =$this->fingerprint->where('fingerprint', $request->cookie('fp'))->update([
            'customer_id' => $customer->id,
        ]);

        $sections = View::make('front.pages.purchase_success.index');

        return response()->json([
            'content' => $sections->render(),
        ]);
    }
}
