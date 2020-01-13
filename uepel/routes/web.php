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
    return view('home');
});*/


Auth::routes();
    Route::get('/', 'HomeController@index')->name('home')->middleware('auth:student');

    /*Route::resource('/posts', "PostsController")->middleware('auth');
    Route::resource('/comments', "CommentController");

    Route::resource('/books', "BooksController")->middleware('auth');

    ;*/
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login.submit');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

/*Route::get('/books/{id}', 'BooksController@show');

Route::get('/books/{id}/edit', 'BooksController@edit');*/

        Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/admin', 'DeanerieController@index')->name('admin.home');
        Route::post('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

//Route::get('/admin/', 'DeanerieController@index')->name('admin.home');



