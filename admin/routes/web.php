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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add_product', 'ProductController@index')->name('product');
Route::post('/add_product', 'ProductController@create')->name('createproduct');
Route::get('/view_product', 'ProductController@view')->name('viewproduct');
Route::get('/edit_product/{id}', 'ProductController@editproduct')->name('editproduct');
Route::post('/edit_product/{id}', 'ProductController@updateproduct')->name('update');
Route::get('/delete_product/{id}', 'ProductController@deleteproduct')->name('delete');





