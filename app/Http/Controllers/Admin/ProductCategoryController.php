<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\DB\productCategory;
use App\Http\Requests\Admin\ProductCategoryRequest;
use Debugbar;

class ProductCategoryController extends Controller
{
    
    protected $product_category;

    public function __construct(ProductCategory $product_category)
    {
        // $this->middleware('auth');
        
        $this->product_category = $product_category;
    }

    public function index()
    {

        $view = View::make('admin.pages.products_categories')
            ->with('product_category', $this->product_category)
            ->with('productsCategories', $this->product_category->where('active', 1)->get());

        if(request()->ajax()) {
            
            $sections = $view->renderSections();
    
            return response()->json([
                'table' => $sections['table'],
                'form' => $sections['form'],
            ]);
        }

        return $view;
    }

    public function create()
    {

        $view = View::make('admin.pages.products_categories')
        ->with('product_category', $this->product_category)
        ->renderSections();

        return response()->json([
            'form' => $view['form'],
        ]);
    }

    public function store(ProductCategory $request)
    {            
    
        $product_category = $this->product_category->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'title' => request('title'),
            'active' => 1,
            'visible' => 1,
        ]);

        $view = View::make('admin.pages.products_categories')
        ->with('productsCategories', $this->product_category->where('active', 1)->get())
        ->with('product_category', $product_category)
        ->renderSections(); 

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
        
    }

    public function edit(ProductCategory $product_category)
    {
        $view = View::make('admin.pages.products_categories')
            ->with('product_category', $product_category)
            ->with('productsCategories', $this->product_category->where('active', 1)->get());   
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 

            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(ProductCategory $product_category){

    }

    public function destroy(ProductCategory $product_category)
    {
        $product_category->active = 0;
        $product_category->save();

        $view = View::make('admin.pages.products_categories')
            ->with('product_category', $this->product_category)
            ->with('productsCategories', $this->product_category->where('active', 1)->get())
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }
}
