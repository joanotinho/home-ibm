<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\DB\ProductsCategory;
use App\Http\Requests\Admin\ProductsCategoryRequest;
use Debugbar;

class ProductsCategoryController extends Controller
{
    
    protected $productsCategory;

    public function __construct(ProductsCategory $productsCategory)
    {
        // $this->middleware('auth');
        
        $this->productsCategory = $productsCategory;
    }
    
    public function index()
    {

        $view = View::make('admin.pages.products_categories')
            ->with('productsCategory', $this->productsCategory)
            ->with('productsCategories', $this->productsCategory->where('active', 1)->get());

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
        ->with('productsCategory', $this->productsCategory)
        ->renderSections();

        return response()->json([
            'form' => $view['form'],
        ]);
    }

    public function store(ProductsCategoryRequest $request)
    {            
    
        $productsCategory = $this->productsCategory->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'title' => request('title'),
            'active' => 1,
            'visible' => 1,
        ]);

        $view = View::make('admin.pages.products_categories')
        ->with('productsCategories', $this->productsCategory->where('active', 1)->get())
        ->with('productsCategory', $productsCategory)
        ->renderSections(); 

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
        
    }

    public function edit(ProductsCategory $productsCategory)
    {
        $view = View::make('admin.pages.products_categories')
            ->with('productsCategory', $productsCategory)
            ->with('productsCategories', $this->productsCategory->where('active', 1)->get());   
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 

            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(ProductsCategory $productsCategory){

    }

    public function destroy(ProductsCategory $productsCategory)
    {
        $productsCategory->active = 0;
        $productsCategory->save();

        $view = View::make('admin.pages.products_categories')
            ->with('productsCategory', $this->productsCategory)
            ->with('productsCategories', $this->productsCategory->where('active', 1)->get())
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }
}
