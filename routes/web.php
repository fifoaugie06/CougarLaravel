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
Route::resource('homes', 'HomesController');

// Products
Route::resource('products', 'ProductsController');

// Customers
Route::get('/customers/nonaktif', 'CustomersController@customerNonAktif');
Route::resource('customers', 'CustomersController');

// Comentars
Route::resource('comentars', 'ComentarsController');
