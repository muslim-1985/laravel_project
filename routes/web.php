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

Route::namespace('Admin')->middleware('auth')->group(function () {
    //Post CRUD routes
    Route::get('/admin','PostController@index');
    Route::get('/admin/post/create', 'PostController@create');
    Route::post('/admin/post/store', 'PostController@store');
    Route::get('/admin/post/{id}','PostController@show');
    Route::get('/admin/post/{id}/edit','PostController@edit');
    Route::put('/admin/post/{id}', 'PostController@update');
    Route::delete('/admin/post/{id}','PostController@destroy');
    //Category CRUD routes
    Route::get('/admin/category', 'CategoryController@index');
    Route::get('/admin/category/create', 'CategoryController@create');
    Route::post('/admin/category/store', 'CategoryController@store');
    Route::get('/admin/category/{id}','CategoryController@show');
    Route::get('/admin/category/{id}/edit','CategoryController@edit');
    Route::patch('/admin/category/{id}', 'CategoryController@update');
    Route::delete('/admin/category/{id}','CategoryController@destroy');

});
