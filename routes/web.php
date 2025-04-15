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
Route::get('/detail/{product:slug}', 'ProductController@show');

Route::get('/login', 'LoginController@index')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@authenticate');
Route::post('/logout', 'LoginController@logout');

Route::get('/register', 'RegisterController@create')->middleware('guest');
Route::post('/register', 'RegisterController@store');

Route::group(['middleware' => 'auth'], function () {

    //Dashboard Home
    Route::get('/dashboard', 'DashboardController@index');

    //Dashboard Product Routes
    Route::get('/dashboard/products', 'DashboardProductsController@index');
    Route::get('/dashboard/products/create', 'DashboardProductsController@create');
    Route::post('/dashboard/products', 'DashboardProductsController@store');
    Route::get('/dashboard/products/{product:slug}', 'DashboardProductsController@show');
    Route::get('/dashboard/products/edit/{product:slug}', 'DashboardProductsController@edit');
    Route::patch('/dashboard/products/{product:slug}', 'DashboardProductsController@update');
    Route::delete('/dashboard/products/{product:slug}', 'DashboardProductsController@destroy');
    Route::get('/dashboard/products/checkSlug', 'DashboardProductsController@checkSlug');

    //Dashboard Category Routes
    Route::get('/dashboard/category', 'DashboardCategoryController@index');
    Route::get('/dashboard/category/create', 'DashboardCategoryController@create');
    Route::post('/dashboard/category', 'DashboardCategoryController@store');
    Route::get('/dashboard/category/edit/{category:slug}', 'DashboardCategoryController@edit');
    Route::patch('/dashboard/category/{category:slug}', 'DashboardCategoryController@update');
    Route::delete('/dashboard/category/{category:slug}', 'DashboardCategoryController@destroy');
    Route::get('/dashboard/category/checkSlug', 'DashboardCategoryController@checkSlug');

    //Dashboard Brand Routes
    Route::get('/dashboard/brand', 'DashboardBrandController@index');
    Route::get('/dashboard/brand/create', 'DashboardBrandController@create');
    Route::post('/dashboard/brand', 'DashboardBrandController@store');
    Route::get('/dashboard/brand/edit/{brand:slug}', 'DashboardBrandController@edit');
    Route::patch('/dashboard/brand/{brand:slug}', 'DashboardBrandController@update');
    Route::delete('/dashboard/brand/{brand:slug}', 'DashboardBrandController@destroy');
    Route::get('/dashboard/brand/checkSlug', 'DashboardBrandController@checkSlug');
});
