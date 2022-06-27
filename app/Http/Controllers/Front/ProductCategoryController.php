<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\DB\ProductCategory;
use Illuminate\Http\Request;
use Debugbar;

class ProductCategoryController extends Controller
{
    protected $product_category;

    public function __construct(ProductCategory $product_category)
    {
        $this->product_category = $product_category;
    }
    
    public function show(ProductCategory $category, Request $request)
    {
        $request->session()->put('category', $category);

        $products = $this->product_category
        ->join('products', 'products_categories.id', '=', 'products.category_id')
        ->join('prices', 'prices.product_id', '=', 'products.id')
        ->where('products_categories.id', $category->id)
        ->where('products.active', 1)
        ->where('products.visible', 1)
        ->where('prices.active', 1)
        ->where('prices.valid', 1)
        ->get();

        $view = View::make('front.pages.products.index')
        ->with('category', $category)
        ->with('products', $products);

        if(request()->ajax()) {

            $sections = $view->renderSections();

            return response()->json([
                'content' => $sections['content'],
            ]);
        };
        
        return $view;
    }
}