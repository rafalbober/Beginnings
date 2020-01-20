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
})->name('welcome');




Route::get('/faq', function () {
    return view('faq.faq');
});

// Student
Route::get('/student/login', 'Auth\StudentLoginController@showLoginForm')->name('login');
Route::post('/student/login', 'Auth\StudentLoginController@login')->name('student.login.submit');
Route::post('/student/logout', 'Auth\StudentLoginController@logout')->name('logout');
Route::get('/student/home', 'StudentController@home')->name('student.home')->middleware('auth:student');
Route::get('/student/subjects_show', 'StudentController@showSubjects')->name('student.subjects_show')->middleware('auth:student');
Route::post('/student/subjects_show/join/{id}', 'StudentController@joinSubject')->name('student.join')->middleware('auth:student');;
Route::get('/student/index/{id}','StudentController@index')->name('student.index')->middleware('auth:student');
Route::get('/student/edit/{id}',"StudentController@edit")->name('student.edit')->middleware('auth:student');
Route::PATCH('/student/edit/update/{id}',"StudentController@update")->name('student.update')->middleware('auth:student');
Route::get('/student/my_subjects', 'StudentController@showMySubjects')->name('student.my_subjects')->middleware('auth:student');
Route::get('/student/my_subjects/show/{id}',"StudentController@showLessons")->name('student_lessons.show')->middleware('auth:student');



// Admin
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'DeanerieController@index')->name('admin.home');
Route::post('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

// Teacher
Route::get('/teacher/login', 'Auth\TeacherLoginController@showLoginForm')->name('teacher.login');
Route::post('/teacher/login', 'Auth\TeacherLoginController@login')->name('teacher.login.submit');
Route::post('/teacher/logout', 'Auth\TeacherLoginController@logout')->name('teacher.logout');
Route::get('/teachers/home', 'TeacherController@home')->name('teacher.home')->middleware('auth:teacher');
Route::get('/teachers/index/{id}','TeacherController@index')->name('teacher.index')->middleware('auth:teacher');
//Route::get('/teachers/request','TeacherController@request')->name('teacher.request')->middleware('auth:teacher');
Route::get('/teachers/request/{id}','TeacherController@request')->name('teacher.request')->middleware('auth:teacher');
Route::post('/teachers/request/accept/{id}','TeacherController@requestAccept')->name('request.accept')->middleware('auth:teacher');
Route::post('/teachers/request/reject/{id}','TeacherController@requestReject')->name('request.reject')->middleware('auth:teacher');
Route::get('/teachers/edit/{id}',"TeacherController@edit")->name('teacher.edit')->middleware('auth:teacher');
Route::PATCH('/teachers/edit/update/{id}',"TeacherController@update")->name('teacher.update')->middleware('auth:teacher');


//Subjects
Route::post('/subjects/store',"SubjectController@store")->name('subject.store')->middleware('auth:teacher');
Route::get('/subjects/create', "SubjectController@create")->name('subject.create')->middleware('auth:teacher');
//Route::get('/subjects', "SubjectController@index")->name('subjects')->middleware('auth:teacher');
Route::get('/subjects/{id}', ['as' => 'subjects.index', 'uses' => 'SubjectController@index'])->middleware('auth:teacher');
Route::get('/subjects/show/{id}',"SubjectController@show")->name('subject.show')->middleware('auth:teacher');
Route::get('/subjects/edit/{id}',"SubjectController@edit")->name('subject.edit')->middleware('auth:teacher');
Route::DELETE('/subjects/edit/delete/{id}',"SubjectController@delete")->name('subject.delete')->middleware('auth:teacher');
Route::PATCH('/subjects/edit/update/{id}',"SubjectController@update")->name('subject.update')->middleware('auth:teacher');
Route::post('/subjects/show/student_details/{id}',"SubjectController@showStudent")->name('subject.student_details')->middleware('auth:teacher');


// Lessons
Route::get('/lessons/create/{id}', "LessonController@create")->name('lesson.create')->middleware('auth:teacher');
Route::post('/lessons/store',"LessonController@store")->name('lesson.store')->middleware('auth:teacher');
Route::get('/lessons/show/{id}',"LessonController@show")->name('lesson.show')->middleware('auth:teacher');
Route::get('/lessons/edit/{id}',"LessonController@edit")->name('lesson.edit')->middleware('auth:teacher');
Route::PATCH('/lessons/edit/update/{id}',"LessonController@update")->name('lesson.update')->middleware('auth:teacher');
Route::DELETE('/lessons/edit/delete/{id}',"LessonController@delete")->name('lesson.delete')->middleware('auth:teacher');


// Degree
Route::PATCH('/lessons/add_Degree/{id}',"DegreeController@addDegreeLesson")->name('lesson.addDegree')->middleware('auth:teacher');
Route::PATCH('/subjects/add_Degree/{id}',"DegreeController@addDegreeSubject")->name('subject.addDegree')->middleware('auth:teacher');

Route::PATCH('/lessons/add_Presence/{id}',"PresenceController@addPresenceLesson")->name('lesson.addPresence')->middleware('auth:teacher');




// Users
Route::get('/deaneries/student_create', "DeanerieController@createStudent")->name('deaneries.student_create')->middleware('auth:admin');
Route::get('/deaneries/teacher_create', "DeanerieController@createTeacher")->name('deaneries.teacher_create')->middleware('auth:admin');
Route::get('/deaneries/teacher_index', 'DeanerieController@indexTeacher')->name('deaneries.teacher_index')->middleware('auth:admin');
Route::get('/deaneries/student_index', 'DeanerieController@indexStudent')->name('deaneries.student_index')->middleware('auth:admin');
Route::post('/deaneries/teacher_store',"DeanerieController@storeTeacher")->name('deaneries.teacher_store')->middleware('auth:admin');
Route::post('/deaneries/student_store',"DeanerieController@storeStudent")->name('deaneries.student_store')->middleware('auth:admin');
Route::get('/deaneries/student_show/{id}',"DeanerieController@showStudent")->name('deaneries.student_show')->middleware('auth:admin');
Route::get('/deaneries/teacher_show/{id}',"DeanerieController@showTeacher")->name('deaneries.teacher_show')->middleware('auth:admin');
Route::PATCH('/deaneries/student_show/update/{id}',"DeanerieController@resetStudentPass")->name('deaneries.student_resetPass')->middleware('auth:admin');
Route::PATCH('/deaneries/teacher_show/update/{id}',"DeanerieController@resetTeacherPass")->name('deaneries.teacher_resetPass')->middleware('auth:admin');
Route::DELETE('/deaneries/teacher_show/delete/{id}',"DeanerieController@deleteTeacher")->name('teacher.delete')->middleware('auth:admin');
Route::DELETE('/deaneries/student_show/delete/{id}',"DeanerieController@deleteStudent")->name('student.delete')->middleware('auth:admin');
















