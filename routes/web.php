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
Route::get('/login', 'LoginController@index');
Route::get('/register', 'RegisterController@create');
