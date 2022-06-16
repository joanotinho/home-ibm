<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
use App\Models\DB\Price;

class Prices
{
    static $composed;

    public function __construct(Price $prices)
    {
        $this->prices = $prices;
    }

    public function compose(View $view)
    {

        if(static::$composed)
        {
            return $view->with('prices', static::$composed);
        }

        static::$composed = $this->prices->where('valid', 1)->get();

        $view->with('prices', static::$composed);

    }
}
