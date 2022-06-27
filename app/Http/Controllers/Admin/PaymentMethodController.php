<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\PaymentMethod;
use Debugbar;

class PaymentMethodController extends Controller
{
    protected $payment_method;

    public function __construct(PaymentMethod $payment_method)
    {
        $this->payment_method = $payment_method;
    }
   
    public function index()
    {
        $view = View::make('admin.pages.payment_methods')
                ->with('payment_method', $this->payment_method)
                ->with('payment_methods', $this->payment_method->where('active', 1)->get());

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

       $view = View::make('admin.pages.payment_methods')
        ->with('payment_method', $this->payment_method)
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(Request $request)
    {            
    
        $payment_method = $this->payment_method->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'title' => request('title'),
            'active' => 1,
        ]);

        $view = View::make('admin.pages.payment_methods')
        ->with('payment_method', $payment_method)
        ->with('payment_methods', $this->payment_method->where('active', 1)->get())
        ->renderSections(); 

        Debugbar::info($view);

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
        
    }
    public function edit(PaymentMethod $payment_method)
    {
        $view = View::make('admin.pages.payment_methods')
            ->with('payment_method', $payment_method)
            ->with('payment_methods', $this->payment_method->where('active', 1)->get());  
       
        if(request()->ajax()) {

            $sections = $view->renderSections();
   
            return response()->json([
                'form' => $sections['form'],
            ]);
        };
               
        return $view;
    }

    public function destroy(PaymentMethod $payment_method)
    {
        $payment_method->active = 0;
        $payment_method->save();

        $view = View::make('admin.pages.payment_methods')
            // el nombre en singular es el formulario
            ->with('payment_method', $this->payment_method)
            ->with('payment_methods', $this->payment_method->where('active', 1)->get())
            ->renderSections();
       
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }
}
