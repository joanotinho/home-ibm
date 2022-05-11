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
    return view('front.pages.desktop.home');
});

Route::redirect('/españa', '/productos');

// Route::get('/', 'App\Http\Controllers\Front\HomeController@index')->name('home_front');


Route::get('/contacto', function () {
    return view('front.pages.desktop.contact');
});

Route::get('/productos', function () {
    return view('front.pages.desktop.products');
});

Route::get('/producto', function () {
    return view('front.pages.desktop.product');
});

Route::get('/carrito', function () {
    return view('front.pages.desktop.cart');
});

Route::get('/caja', function () {
    return view('front.pages.desktop.checkout');
});

Route::get('/faqs', function () {
    return view('front.pages.desktop.faqs');
});