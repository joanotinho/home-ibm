<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CheckoutRequest;
use App\Models\DB\Sale;
use App\Models\DB\Customer;
use App\Models\DB\Cart;
use App\Models\DB\PaymentMethod;
use Request;
// use App\Models\DB\Sale;
use Debugbar;

class CheckoutController extends Controller
{
    public function __construct(Sale $sale, Customer $customer, Cart $cart, PaymentMethod $payment_method)
    {
        $this->sale = $sale;
        $this->customer = $customer;
        $this->cart = $cart;
        $this->payment_method = $payment_method;
    }

    public function index()
    {
        $view = View::make('front.pages.checkout.index');

        Debugbar::info('normal request');
        if(request()->ajax()) {
            Debugbar::info('Ajax request');

            $sections = $view->renderSections();

            return response()->json([
                'content' => $sections['content'],
            ]);
        }
        
        return $view;
    }
    
    public function store(Request $request)
    {
        Debugbar::info('Store request');
        $totals = $this->cart
        ->where('carts.fingerprint', 1)
        ->where('carts.active', 1)
        ->where('carts.sale_id', null)
        ->join('prices', 'prices.id', '=', 'carts.price_id')
        ->join('taxes', 'taxes.id', '=', 'prices.tax_id')
        ->select(DB::raw('sum(prices.base_price) as base_total'), DB::raw('sum(prices.base_price * taxes.multiplier) as total') )
        ->first();

        $selected = request('paymentmethod');

        $sale = $this->sale->updateOrCreate([
            'id' => request('id')],[
            'customer_id' => 1,
            'total_base_price' => $totals->base_total,
            'total_tax_price' => $totals->total - $totals->base_total,
            'total_price' => $totals->total,
            'payment_method_id' => $this->payment_method->where('id', $selected)->first()->id,
            'ticket_number' => rand(1000, 9999),
            'date_emission' => date('Y-m-d'),
            'time_emission' => date('H:i:s'),
            'active' => 1,

        ]);
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

        $carts = $this->cart->where('sale_id', null)->where('fingerprint', 1)->where('active', 1)->get();

        foreach ($carts as $cart) {
            $cart->sale_id = $sale->id;
            $cart->customer_id = $customer->id;
            $cart->save();
        }

        $sections = View::make('front.pages.purchase_success.index');

        return response()->json([
            'content' => $sections->render(),
        ]);
    }
}
