<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\DB\Customer;
use App\Http\Requests\Admin\CustomerRequest;
use Debugbar;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
   
    public function index()
    {
        $view = View::make('admin.pages.customers')
                ->with('customer', $this->customer)
                ->with('customers', $this->customer->where('active', 1)->get());

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

       $view = View::make('admin.pages.customers')
        ->with('customer', $this->customer)
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(CustomerRequest $request)
    {            
    
        $customer = $this->customer->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'surnames' => request('surnames'),
            'company' => request('company'),
            'country' => request('country'),
            'province' => request('province'),
            'address' => request('address'),
            'extra_address' => request('extra_address'),
            'city' => request('city'),
            'postal_code' => request('postal_code'),
            'phonenumber' => request('phonenumber'),
            'email' => request('email'),
            'payment_method' => request('payment_method'),
            'active' => 1,
            'visible' => 1,
        ]);

        $view = View::make('admin.pages.customers')
        ->with('customer', $customer)
        ->with('customers', $this->customer->where('active', 1)->get())
        ->renderSections(); 

        Debugbar::info($view);

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
        
    }
    public function edit(Customer $customer)
    {
        $view = View::make('admin.pages.customers')
            ->with('customer', $customer)
            ->with('customers', $this->customer->where('active', 1)->get());  
       
        if(request()->ajax()) {

            $sections = $view->renderSections();
   
            return response()->json([
                'form' => $sections['form'],
            ]);
        };
               
        return $view;
    }

    public function show(Customer $customer){

    }

    public function destroy(customer $customer)
    {
        $customer->active = 0;
        $customer->save();

        $view = View::make('admin.pages.customers')
            // el nombre en singular es el formulario
            ->with('customer', $this->customer)
            ->with('customers', $this->customer->where('active', 1)->get())
            ->renderSections();
       
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }
}
