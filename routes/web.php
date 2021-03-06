<?php

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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/products', "ProductsController@directory");

Route::get('/products/{id}', "ProductsController@show");

Route::post('/addToCart/{id}', "ProductsController@addToCart");

Route::post('/removeFromCart/{id}', "ProductsController@removeFromCart");

Route::get('/cart', "ProductsController@viewCart");

Route::post('/cart', "ProductsController@finishCheckout")->middleware('auth');

Route::get('/search', "ProductsController@search");

Route::get('/category', "ProductsController@category");

Route::post('/deleteProduct', "ProductsController@delete")->middleware('admin');

Route::get('/create', "ProductsController@create")->middleware('admin');

Route::post('/create', "ProductsController@save")->middleware('admin');

Route::get('/perfil', "UserController@show")->middleware('auth');

Route::get('/registeradmin', "AdminController@add")->middleware('admin');

Route::post('/registeradmin', "AdminController@store")->middleware('admin');
