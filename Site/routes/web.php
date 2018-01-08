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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('home/products','UsersController@show');
Route::post('home/products/{product}/delete','UsersController@delete');
Route::post('home/products/add','UsersController@add');
Route::post('home/products/{product}/update','UsersController@update');
