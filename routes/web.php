<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'ProductController@index');
Route::get('/detail/{product:name}', 'ProductController@show');

Route::get('/login', 'LoginController@index')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@authenticate');
Route::post('/logout', 'LoginController@logout');

Route::get('/register', 'RegisterController@create')->middleware('guest');
Route::post('/register', 'RegisterController@store');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/dashboard/products', 'DashboardProductsController@index');
    Route::get('/dashboard/products/create', 'DashboardProductsController@create');
    Route::post('/dashboard/products', 'DashboardProductsController@store');
    Route::get('/dashboard/products/{product:name}', 'DashboardProductsController@show');
    Route::get('/dashboard/products/edit/{product:name}', 'DashboardProductsController@edit');
    Route::patch('/dashboard/products/{product:name}', 'DashboardProductsController@update');
    Route::delete('/dashboard/products/{product:name}', 'DashboardProductsController@destroy');
});
