<?php

namespace App\Http\ViewComposers\Front;

use Illuminate\View\View;
use App\Models\DB\Country;
use Debugbar;

class Countries
{
    static $composed;

    public function __construct(Country $countries)
    {
        $this->countries = $countries;
    }

    public function compose(View $view)
    {

        if(static::$composed)
        {
            return $view->with('countries', static::$composed);
        }

        static::$composed = $this->countries->get();

        $view->with('countries', static::$composed);

    }
}
