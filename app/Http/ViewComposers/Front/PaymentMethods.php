<?php

namespace App\Http\ViewComposers\Front;

use Illuminate\View\View;
use App\Models\DB\PaymentMethod;
use Debugbar;

class PaymentMethods
{
    static $composed;

    public function __construct(PaymentMethod $payment_methods)
    {
        $this->payment_methods = $payment_methods;
    }

    public function compose(View $view)
    {

        if(static::$composed)
        {
            return $view->with('payment_methods', static::$composed);
        }

        static::$composed = $this->payment_methods->where('active', 1)->get();

        $view->with('payment_methods', static::$composed);

    }
}
