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

/*Route::get('/', function () {
    return view('welcome');
});*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//бэкенд
Route::namespace('Admin')->middleware('auth')->group(function () {
    //Post CRUD routes
    Route::get('/admin','PostController@index');
    Route::get('/admin/post/create', 'PostController@create');
    Route::post('/admin/post/store', 'PostController@store');
    Route::get('/admin/post/{id}','PostController@show');
    Route::get('/admin/post/{id}/edit','PostController@edit');
    Route::patch('/admin/post/{id}', 'PostController@update')->name('update');
    Route::delete('/admin/post/{id}','PostController@destroy');
    //Category filter
    Route::get('/admin/post/category/{id}','PostController@CategoryFilter')->name('category.filter');
    //Category CRUD routes
    Route::get('/admin/category', 'CategoryController@index');
    Route::get('/admin/category/create', 'CategoryController@create');
    Route::post('/admin/category/store', 'CategoryController@store');
    Route::get('/admin/category/{id}','CategoryController@show');
    Route::get('/admin/category/{id}/edit','CategoryController@edit');
    Route::patch('/admin/category/{id}', 'CategoryController@update');
    Route::delete('/admin/category/{id}','CategoryController@destroy');
    //Tag CRUD routes
    Route::get('/admin/tag', 'TagController@index');
    Route::get('/admin/tag/create', 'TagController@create');
    Route::post('/admin/tag/store', 'TagController@store');
    Route::get('/admin/tag/{id}','TagController@show');
    Route::get('/admin/tag/{id}/edit','TagController@edit');
    Route::patch('/admin/tag/{id}', 'TagController@update');
    Route::delete('/admin/tag/{id}','TagController@destroy');
    Route::get('/admin/post/tag/{id}','TagController@TagFilter')->name('tag.filter');

});
//фронтенд
Route::namespace('Attachment')->group(function (){
   Route::get('/','SiteController@index')->name('home.user');
   Route::get('/post/{id}','SiteController@PostShow')->name('post.single');
   Route::post('/comments/{post_id}', 'CommentController@Store')->name('comment.store');
   Route::get('/portfolio/project/{id}','SiteController@SingleProject')->name('single.project');
    //comments backend
    Route::get('/admin/comment','CommentController@Index')->name('admin.comment.index');
    Route::get('/admin/comment/{id}','CommentController@show')->name('admin.comment.show');
    Route::get('/admin/comment/{id}/edit','CommentController@edit')->name('admin.comment.edit');
    Route::patch('/admin/comment/{id}','CommentController@update')->name('admin.comment.update');
    Route::delete('/admin/comment/{id}','CommentController@destroy')->name('admin.destroy.comment');
    //обновление чекбокса публикации комментария
    Route::patch('/admin/comment/{id}/approve','CommentController@ApprovedComment')->name('admin.comment.approved');
    //фильтр комментариев по авторам
    Route::get('/admin/comment/author/{id}','CommentController@AuthorFilter')->name('comment.admin.filter');
});
//кастомная авторизация и аутентификация
Route::namespace('Auth')->group(function ()
{
    //custom autentification
  Route::get('/user/login', 'AdminController@ShowLoginForm')->name('admin.login.dashboard');
  Route::post('/user/login','AdminController@Login')->name('admin.login.submit');
  Route::post('/user/logout', 'AdminController@Logout')->name('admin.logout');
  Route::get('/user/register','RegisterAdminController@ShowRegisterForm')->name('admin.register');
  Route::post('/user/register','RegisterAdminController@Register')->name('admin.register.submit');
  //user backend
  Route::get('/admin/user','RegisterAdminController@ShowUsers')->name('admin.show');
  Route::delete('/admin/user/{id}','RegisterAdminController@destroy')->name('admin.destroy');
  //admin custom logout
  Route::post('/admin/logout','LoginController@UserLogout')->name('user.logout');
});
