<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\DB\Product;
use Illuminate\Support\Facades\DB;
use Debugbar;

class ProductController extends Controller
{
    protected $product;
    protected $productCategory;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    
    public function index()
    {
        $view = View::make('front.pages.products.index')
        ->with('products', $this->product->where('active', 1)->where('visible', 1)
        ->get());

        if(request()->ajax()) {

            $sections = $view->renderSections();

            return response()->json([
                'content' => $sections['content'],
            ]);
        }
        
        return $view;
    }

    public function show(Product $product)
    {

        $view = View::make('front.pages.product.index')
        ->with('product', $product);
        
        if(request()->ajax()) {

            $sections = $view->renderSections();

            return response()->json([
                'content' => $sections['content'],
            ]);
        }

        return $view;
    }
    
    public function order($order)
    {
        $products = Product::with(['prices' => function($query) use ($order) {
            $query
            ->where('order', $order)
            ->sortBy('prices', $order);
        }])->where('active', 1)->where('visible', 1)->get();

        $products = $this->product
        ->with('products')
        ->join('prices', 'prices.product_id', '=', 'products.id')
        ->select('products.*')
        ->orderBy('prices.base_price', $order)
        ->get();
        
        Debugbar::info($products->toArray());

        $view = View::make('front.pages.products.index')
        ->with('products', $products);
        
        if(request()->ajax()) {

            $sections = $view->renderSections();

            return response()->json([
                'content' => $sections['content'],
            ]);
        }

        return $view;
    }
}