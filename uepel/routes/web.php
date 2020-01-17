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
})->name('welcome');




Route::get('/faq', function () {
    return view('faq.faq');
});
// Student


Route::get('/student/login', 'Auth\StudentLoginController@showLoginForm')->name('login');
Route::post('/student/login', 'Auth\StudentLoginController@login')->name('student.login.submit');
Route::get('/students/home', 'StudentController@index')->name('student.home')->middleware('auth:student');
Route::post('/student/logout', 'Auth\StudentLoginController@logout')->name('logout');

// Admin
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'DeanerieController@index')->name('admin.home');
Route::post('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

// Teacher
Route::get('/teacher/login', 'Auth\TeacherLoginController@showLoginForm')->name('teacher.login');
Route::post('/teacher/login', 'Auth\TeacherLoginController@login')->name('teacher.login.submit');
Route::get('/teachers/home', 'TeacherController@index')->name('teacher.home')->middleware('auth:teacher');
Route::post('/teacher/logout', 'Auth\TeacherLoginController@logout')->name('teacher.logout');


Route::post('/subjects/store',"SubjectController@store")->name('subject.store')->middleware('auth:teacher');
Route::get('/subjects/create', "SubjectController@create")->name('subject.create')->middleware('auth:teacher');
//Route::get('/subjects', "SubjectController@index")->name('subjects')->middleware('auth:teacher');
Route::get('/subjects/{id}', ['as' => 'subjects.index', 'uses' => 'SubjectController@index'])->middleware('auth:teacher');
Route::get('/subjects/show/{id}',"SubjectController@show")->name('subject.show')->middleware('auth:teacher');
Route::get('/subjects/edit/{id}',"SubjectController@edit")->name('subject.edit')->middleware('auth:teacher');
Route::DELETE('/subjects/edit/delete/{id}',"SubjectController@delete")->name('subject.delete')->middleware('auth:teacher');
Route::PATCH('/subjects/edit/update/{id}',"SubjectController@update")->name('subject.update')->middleware('auth:teacher');

Route::get('/lessons/create/{id}', "LessonController@create")->name('lesson.create')->middleware('auth:teacher');
Route::post('/lessons/store',"LessonController@store")->name('lesson.store')->middleware('auth:teacher');



Route::get('/deaneries/student_create', "DeanerieController@createStudent")->name('deaneries.student_create')->middleware('auth:admin');
Route::get('/deaneries/teacher_create', "DeanerieController@createTeacher")->name('deaneries.teacher_create')->middleware('auth:admin');
Route::get('/deaneries/teacher_index', 'DeanerieController@indexTeacher')->name('deaneries.teacher_index')->middleware('auth:admin');
Route::get('/deaneries/student_index', 'DeanerieController@indexStudent')->name('deaneries.student_index')->middleware('auth:admin');
Route::post('/deaneries/teacher_store',"DeanerieController@storeTeacher")->name('deaneries.teacher_store')->middleware('auth:admin');
Route::post('/deaneries/student_store',"DeanerieController@storeStudent")->name('deaneries.student_store')->middleware('auth:admin');











