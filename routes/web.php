<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

Route::middleware('admin')->group(function () {

    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')
        ->name("admin.product.store");

    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')
        ->name("admin.product.delete");
    Route::delete('/admin/home/{id}/delete', 'App\Http\Controllers\Admin\AdminHomeController@delete')
        ->name("admin.home.delete");
    Route::put('/admin/home/{id}/promote', 'App\Http\Controllers\Admin\AdminProductController@promote')
        ->name("admin.home.promote");
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')
        ->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')
        ->name("admin.product.update");
        
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/cart', 'App\Http\Controllers\UserController@cart')->name('user.cart');
    Route::get('/user/{id}', 'App\Http\Controllers\UserController@show')->name("user.show");
    Route::delete('/user/{id}/delete', 'App\Http\Controllers\UserController@delete_user')->name("user.delete");
    Route::post('/add-to-cart/{product}', 'App\Http\Controllers\UserController@addToCart')->name('add-to-cart');
    Route::post('/user/checkout', 'App\Http\Controllers\UserController@checkout')->name('user.checkout');
    Route::get('/user/{id}/order/{oid}', 'App\Http\Controllers\UserController@order')->name('user.order');
    Route::delete('/user/product/{id}/delete', 'App\Http\Controllers\UserController@delete')
        ->name("user.product.delete");
});

Auth::routes();
