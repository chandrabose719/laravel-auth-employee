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

Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');

Route::get('/register', 'HomeController@register');
Route::post('/register', 'HomeController@register_operation');

Route::get('/login', 'HomeController@login');
Route::post('/login', 'HomeController@login_operation');

Route::get('/logout', 'HomeController@logout');

Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/new-customer', 'HomeController@new_customer');
Route::post('/new-customer', 'HomeController@store_new_customer');
Route::get('/edit-customer/{id}', 'HomeController@edit_customer');
Route::post('/edit-customer/{id}', 'HomeController@store_edit_customer');
Route::post('/filter-customer', 'HomeController@filter_customer');



