<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\DB\Product;
use App\Models\DB\Price;
use App\Http\Requests\Admin\ProductRequest;
use Debugbar;

class ProductController extends Controller
{
    
    protected $product;

    public function __construct(Product $product, Price $price)
    {
        $this->product = $product;
        $this->price = $price;
    }
    public function index()
    {

        $view = View::make('admin.pages.products')
            ->with('product', $this->product)
            ->with('products', $this->product->where('active', 1)->get());
            
        if(request()->ajax()) {
            
            return response()->json([
                'table' => $sections['table'],
                'form' => $sections['form'],
            ]);
        }

        return $view;
    }

    public function create()
    {

        $view = View::make('admin.pages.products')
        ->with('product', $this->product)
        ->renderSections();

        return response()->json([
            'form' => $view['form'],
        ]);
    }

    public function store(ProductRequest $request)
    {            
    
        $product = $this->product->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'title' => request('title'),
            'description' => request('description'),
            'features' => request('features'),
            'category_id' => request('category_id'),
            'active' => 1,
            'visible' => 1,
        ]);

        $this->price->where('product_id', $product->id)->update([
            'valid' => 0,
        ]);

        $price = $this->price->create([
            'product_id' => $product->id,
            'base_price' => request('price'),
            'tax_id' => request('tax_id'),
            'valid' => 1,
            'active' => 1,
        ]);

        // $prices = $product->price()->updateOrCreate([
        //     'id' => request('price_id'),],[
        //     'base_price' => request('base_price'),
        //     'valid' => 1,
        //     'active' => 1,
        //     'tax_id' => request('tax_id'),
        //     'product_id' => $product->id,
        // ]);

        $view = View::make('admin.pages.products')
        ->with('product', $product)
        ->with('products', $this->product->where('active', 1)->get())
        ->renderSections(); 

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
        
    }

    public function edit(Product $product)
    {
        $view = View::make('admin.pages.products')
            ->with('product', $product)
            ->with('products', $this->product->where('active', 1)->get());
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 

            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(Product $product){

    }

    public function destroy(Product $product)
    {
        $product->active = 0;
        $product->save();

        $view = View::make('admin.pages.products')
            ->with('product', $this->product)
            ->with('products', $this->product->where('active', 1)->get())
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }
}
