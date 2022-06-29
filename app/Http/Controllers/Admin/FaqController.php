<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\DB\Faq;
use App\Http\Requests\Admin\FaqRequest;
use Debugbar;

class FaqController extends Controller
{
    protected $faq;
    
    /*
    Las siguientes líneas son métodos. Un método se identifica porque
    escribimos "public function". Public en este caso significa que esta función
    puede ser llamada por otro archivo para que se ejecute el código que hay dentro de
    la función.
    Cuando llamamos a un método antes de nada se ejecutara el método
    __construct (constructor). El constructor se utiliza normalmente para
    dar un valor a las propiedades.
    En este caso estamos construyendo el objeto del modelo Faq y asignándolo
    a la propiedad $this->faq para poder tener disponible el modelo dentro de
    cada método. Existen tres formas de construir (instanciar) un objeto, instanciar un objeto
    significa que hacemos disponible su código para poder ser usado.
    1ª Forma (clásica):
    $faq = new Faq();
    En esta forma estamos creando una variable que se llama faq, y que tiene como valor el objeto Faq. Si vemos
    la palabra "new" significa que se está instanciando el objeto.
    2ª Forma (inyección de dependencias, la más óptima):
    __construct(Faq $faq)
    En esta forma lo que hacemos es poner entre los paréntesis de un método (en este ejemplo en el método __construct) el nombre
    del objeto y una variable que tendrá como valor el objeto ya instanciado. El nombre de la variable puede ser el que queramos,
    pero normalmente solemos poner como nombre de la variable el mismo nombre del objeto.
    3ª Forma (uso de métodos estáticos, la menos óptima)
    View::make('admin.pages.faqs')
    En esta forma lo que hacemos es usar un método de un objeto sin necesidad de instanciarlo. En este caso estamos usando el método
    make del objeto View.
    Finalmente, una vez instanciado un objeto (por ejemplo, el objeto Faq) podemos acceder a sus propiedades escribiendo:
    $faq = new Faq;
    $faq->name;
    En este caso estamos accediendo a la propiedad "name" del objeto "faq";
    Si queremos acceder al método de un objeto tenemos que escribir:
    $faq->get();
   
    */

    public function __construct(Faq $faq)
    {
        $this->faq = $faq;
    }
   
    public function index()
    {

        /*
            En este momento estamos usando el objeto View para crear una vista, a la cual le estamos pasando dos variables
            (faq y faqs). La primera variable tiene como valor los campos de la tabla faqs vacios, y la segunda variable
            tiene como valor todos los registros de la tabla faqs. Para pedir todos los datos hemos escrito: $this->faq->get();
        */

        $view = View::make('admin.pages.faqs')
            ->with('faq', $this->faq)
            ->with('faqs', $this->faq->where('active', 1)->get());

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

       $view = View::make('admin.pages.faqs')
        ->with('faq', $this->faq)
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(FaqRequest $request)
    {
        $faq = $this->faq->updateOrCreate([
                'id' => request('id')],[
                'name' => request('name'),
                'title' => request('title'),
                'description' => request('description'),
                'visible' => 1,
                'active' => 1,
        ]);
           
        $view = View::make('admin.pages.faqs')
        // pasa dos variables al html. La variable faqs, para hacer el bucle y la variable faq, para mostrar los datos
        ->with('faqs', $this->faq->where('active', 1)->get())
        ->with('faq', $faq)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }

    public function edit(Faq $faq)
    {
        $view = View::make('admin.pages.faqs')
        ->with('faq', $faq)
        ->with('faqs', $this->faq->where('active', 1)->get());  
       
        if(request()->ajax()) {

            $sections = $view->renderSections();
   
            return response()->json([
                'form' => $sections['form'],
            ]);
        }
               
        return $view;
    }

    public function show(Faq $faq){

    }

    public function destroy(Faq $faq)
    {
        $faq->active = 0;
        $faq->save();

        $view = View::make('admin.pages.faqs')
            // el nombre en singular es el formulario
            ->with('faq', $this->faq)
            ->with('faqs', $this->faq->where('active', 1)->get())
            ->renderSections();
       
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }
}
