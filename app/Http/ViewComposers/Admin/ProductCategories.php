<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
use App\Models\DB\ProductCategory;

class ProductCategories
{
    static $composed;

    public function __construct(ProductCategory $product_categories)
    {
        $this->product_categories = $product_categories;
    }

    public function compose(View $view)
    {

        if(static::$composed)
        {
            return $view->with('product_categories', static::$composed);
        }

        static::$composed = $this->product_categories->where('active', 1)->get();   

        $view->with('product_categories', static::$composed);

    }
}
