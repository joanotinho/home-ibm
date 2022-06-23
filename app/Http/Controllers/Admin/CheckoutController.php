<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\DB\Sale;
use Debugbar;
use Request;

class CheckoutController extends Controller
{
    protected $sale;

    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
        Debugbar::info($sale);
    }
   
    public function index()
    {

        $view = View::make('admin.pages.checkout')
            ->with('sale', $this->sale)
            ->with('sales', $this->sale->where('active', 1)->get());

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

       $view = View::make('admin.pages.checkout')
        ->with('sale', $this->sale)
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(Request $request)
    {
        $sale = $this->sale->updateOrCreate([
                'id' => request('id')],[
                'name' => request('name'),
                'title' => request('title'),
                'description' => request('description'),
                'visible' => 1,
                'active' => 1,
        ]);
           
        $view = View::make('admin.pages.checkout')
        ->with('sales', $this->sale->where('active', 1)->get())
        ->with('sale', $sale)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }

    public function edit(Sale $sale)
    {
        $view = View::make('admin.pages.checkout')
        ->with('sale', $sale)
        ->with('sales', $this->sale->where('active', 1)->get());  
       
        if(request()->ajax()) {

            $sections = $view->renderSections();
   
            return response()->json([
                'form' => $sections['form'],
            ]);
        }
               
        return $view;
    }

    public function destroy(Sale $sale)
    {
        $sale->active = 0;
        $sale->save();

        $view = View::make('admin.pages.checkout')
            // el nombre en singular es el formulario
            ->with('sale', $this->sale)
            ->with('sales', $this->sale->where('active', 1)->get())
            ->renderSections();
       
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }
}
