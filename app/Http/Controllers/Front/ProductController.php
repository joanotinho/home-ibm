<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\DB\Product;
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
        ->with('products', $this->product->where('active', 1)->where('visible', 1)->get())
        ->with('order', '');

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

        $view = View::make('front.pages.products.index');

        if ($order == 'asc') {
            $view
            ->with('products', $this->product->where('active', 1)->where('visible', 1)->orderBy('price', $order)->get())
            ->with('order', $order);
        } elseif ($order == 'desc') {
            $view->with('products', $this->product->where('active', 1)->where('visible', 1)->orderBy('price', $order)->get())
            ->with('order', $order);
        } else {
            $view->with('products', $this->product->where('active', 1)->where('visible', 1)->get());
        }
        
        if(request()->ajax()) {

            $sections = $view->renderSections();

            return response()->json([
                'content' => $sections['content'],
            ]);
        }

        return $view;
    }
}