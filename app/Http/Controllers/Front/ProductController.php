<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\DB\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
        $products = $this->product
        ->join('prices', 'prices.product_id', '=', 'products.id')
        ->where('products.active', 1)
        ->where('products.visible', 1)
        ->where('prices.active', 1)
        ->where('prices.valid', 1)
        ->get();

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
    
    public function order($order, Request $request)
    {
        if ($request->session()->has('category')) {
            $products = $this->product
            ->join('prices', 'prices.product_id', '=', 'products.id')
            ->where('products.active', 1)
            ->where('products.category_id', $request->session()->get('category')->id)
            ->where('products.visible', 1)
            ->where('prices.active', 1)
            ->where('prices.valid', 1)
            ->orderBy('prices.base_price', $order)
            ->get();
        }else{
            $products = $this->product
            ->join('prices', 'prices.product_id', '=', 'products.id')
            ->where('products.active', 1)
            ->where('products.visible', 1)
            ->where('prices.active', 1)
            ->where('prices.valid', 1)
            ->orderBy('prices.base_price', $order)
            ->get();
        }
        
        
        $view = View::make('front.pages.products.index')
        ->with('products', $products)
        ->with('order', $order);
        
        if(request()->ajax()) {

            $sections = $view->renderSections();

            return response()->json([
                'content' => $sections['content'],
            ]);
        }

        return $view;
    }
}