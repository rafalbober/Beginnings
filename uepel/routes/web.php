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

/*
Route::get('/', function () {
    return view('home');
});
*/
/*
Route::resource('/posts', "PostsController")->middleware('auth');
Route::resource('/comments', "CommentController");
Route::resource('/books', "BooksController")->middleware('auth');
Route::get('/books/{id}', 'BooksController@show');
Route::get('/books/{id}/edit', 'BooksController@edit');
*/

//Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/faq', function () {
    return view('faq.faq');
});
// Student


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login.submit');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth:student');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Admin
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'DeanerieController@index')->name('admin.home');
Route::post('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

// Teacher
Route::get('/teacher/login', 'Auth\TeacherLoginController@showLoginForm')->name('teacher.login');
Route::post('/teacher/login', 'Auth\TeacherLoginController@login')->name('teacher.login.submit');
Route::get('/teacher', 'TeacherController@index')->name('teacher.home')->middleware('auth:teacher');
Route::post('/teacher/logout', 'Auth\TeacherLoginController@logout')->name('teacher.logout');


Route::post('/subjects/store',"SubjectController@store")->name('subject.store')->middleware('auth:teacher');
Route::get('/subjects/create', "SubjectController@create")->name('subject.create')->middleware('auth:teacher');
//Route::get('/subjects', "SubjectController@index")->name('subjects')->middleware('auth:teacher');
Route::get('/subjects/{id}', ['as' => 'subjects.index', 'uses' => 'SubjectController@index'])->middleware('auth:teacher');
Route::get('/subjects/show/{id}',"SubjectController@show")->name('subject.show')->middleware('auth:teacher');
Route::get('/subjects/edit/{id}',"SubjectController@edit")->name('subject.edit')->middleware('auth:teacher');
Route::PATCH('/subject/update/{id}',"SubjectController@store")->name('subject.update')->middleware('auth:teacher');






