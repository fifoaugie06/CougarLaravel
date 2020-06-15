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

// Auth
Route::get('/', 'AuthController@index');
Route::post('/', 'AuthController@auth');
Route::get('/register', 'AuthController@register');
Route::post('/register', 'AuthController@store');
Route::get('/logout', 'AuthController@logout');

// Homes
//Route::get('/', 'HomesController@index');

// Products
Route::resource('products', 'ProductsController');

// Homes
Route::resource('homes', 'HomesController');

// Customers
Route::get('/customers/nonaktif', 'CustomersController@customerNonAktif');
Route::resource('customers', 'CustomersController');
