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
    Route::get('/admin','PostController@index');
    Route::get('/admin/post/create', 'PostController@create');
    Route::post('/admin/post/store', 'PostController@store');
    Route::get('/admin/post/{id}','PostController@show');
    Route::get('/admin/post/{id}/edit','PostController@edit');
    Route::put('/admin/post/{id}', 'PostController@update');
    Route::delete('/admin/post/{id}','PostController@destroy');
});
