<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // La primera línea dice en que vista quiero tener disponible
        // el contenido definido de la segunda línea.

        // Para pasarle una segunda vista, se pasa como segundo parámetro dentro del array.

        // En la segunda línea digo que archivo va a ser el que haga la 
        // consulta a la base de datos para obtener los datos que quiero.

        // para crear otra variable, se hace copy paste de todo
        
        view()->composer([
            'front.pages.products.index'],
            'App\Http\ViewComposers\Front\ProductCategories'
        );

        view()->composer([
            'admin.pages.products'],
            'App\Http\ViewComposers\Admin\ProductCategories'
        );
    }
}
