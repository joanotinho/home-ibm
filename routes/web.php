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
    
    Route::resource('/productos/categorias', 'App\Http\Controllers\Admin\ProductCategoryController', [
        'parameters' => [
            'categorias' => 'products_category', 
        ],
        'names' => [
            'index' => 'products_categories',
            'create' => 'products_categories_create',
            'edit' => 'products_categories_edit',
            'store' => 'products_categories_store',
            'destroy' => 'products_categories_destroy',
            'show' => 'products_categories_show',
        ]
    ]);
    
    Route::resource('productos', 'App\Http\Controllers\Admin\ProductController', [
        'parameters' => [
            'productos' => 'product', 
        ],
        'names' => [
            'index' => 'products',
            'getProductsCategories' => 'products_categories',
            'create' => 'products_create',
            'edit' => 'products_edit',
            'store' => 'products_store',
            'destroy' => 'products_destroy',
            'show' => 'products_show',
        ]
    ]);
    
    Route::resource('clientes', 'App\Http\Controllers\Admin\CustomerController', [
        'parameters' => [
            'clientes' => 'customer', 
        ],
        'names' => [
            'index' => 'customers',
            'create' => 'customers_create',
            'edit' => 'customers_edit',
            'store' => 'customers_store',
            'destroy' => 'customers_destroy',
            'show' => 'customers_show',
        ]
    ]);
});


Route::get('/', 'App\Http\Controllers\Front\HomeController@index')->name('front_home');

Route::get('/contacto', 'App\Http\Controllers\Front\ContactController@index')->name('front_contact');
Route::post('/contacto', 'App\Http\Controllers\Front\ContactController@store')->name('contacts_store');

Route::get('/faqs', 'App\Http\Controllers\Front\FaqController@index')->name('front_faqs');

Route::get('/productos', 'App\Http\Controllers\Front\ProductController@index')->name('front_products');
Route::get('/productos/{product}', 'App\Http\Controllers\Front\ProductController@show')->name('front_product');
Route::get('/productos/categoria/{category}', 'App\Http\Controllers\Front\ProductCategoryController@show')->name('front_product_category');
Route::get('/productos/order/{order}', 'App\Http\Controllers\Front\ProductController@order')->name('front_product_order');
Route::post('/productos', 'App\Http\Controllers\Front\CartController@store')->name('front_cart_store');
Route::get('/productos/plus/{fingerprint}/{price_id}', 'App\Http\Controllers\Front\CartController@plus')->name('front_cart_plus');
Route::get('/productos/minus/{fingerprint}/{price_id}', 'App\Http\Controllers\Front\CartController@minus')->name('front_cart_minus');

Route::get('/carrito', 'App\Http\Controllers\Front\CartController@index')->name('front_cart');

Route::get('/caja', 'App\Http\Controllers\Front\CheckoutController@index')->name('front_checkout');