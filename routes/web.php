<?php

use Illuminate\Support\Facades\Route;

use front\layout\partials\HeaderComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function () {

    Route::resource('faqs', 'App\Http\Controllers\Admin\FaqController', [
        'parameters' => [
            'faqs' => 'faq', 
        ],
        'names' => [
            'index' => 'faqs',
            'create' => 'faqs_create',
            'edit' => 'faqs_edit',
            'store' => 'faqs_store',
            'destroy' => 'faqs_destroy',
            'show' => 'faqs_show',
        ]
    ]);

    Route::resource('usuarios', 'App\Http\Controllers\Admin\UserController', [
        'parameters' => [
            'usuarios' => 'user', 
        ],
        'names' => [
            'index' => 'users',
            'create' => 'users_create',
            'edit' => 'users_edit',
            'store' => 'users_store',
            'destroy' => 'users_destroy',
            'show' => 'users_show',
        ]
    ]);
});


Route::get('/', function () {
    return view('front.pages.home.index');
});

Route::redirect('/españa', '/productos');

// Route::get('/', 'App\Http\Controllers\Front\HomeController@index')->name('home_front');


Route::get('/contacto', function () {
    return view('front.pages.contact.index');
});

Route::get('/productos', function () {
    return view('front.pages.products.index');
});

Route::get('/producto', function () {
    return view('front.pages.product.index');
});

Route::get('/carrito', function () {
    return view('front.pages.cart.index');
});

Route::get('/caja', function () {
    return view('front.pages.checkout.index');
});

Route::get('/faqs', function () {
    return view('front.pages.faqs.index');
});