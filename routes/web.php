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

use App\Http\Controllers\CourseController;

Auth::routes();

Route::get('/', 'CourseController@getMultiResource');
Route::get('/contacts', 'CourseController@contact');

Route::get('/home', 'HomeController@index');
Route::post('/courses', 'CourseController@store');

Route::get('/courses', 'CourseController@index')->name('all_courses');
// Route::resource('/courses', 'CourseController');
Route::post('/carts', 'CartController@store');
Route::get('/carts/all', 'CartController@index');
Route::delete('/carts/{id}', 'CartController@destroy');
Route::get('/shopping_carts', 'ShoppingCartController@index')->name('cart');
Route::get('/shopping_carts/all', 'CartController@shoppingCart');
Route::put('/shopping_carts/updateUser', 'UserController@update');
Route::get('/shopping_carts/retrieveInfo', 'UserController@index');
Route::get('/carts/checkout', 'CartController@successBuy');
Route::post('/carts/ref', 'CartController@insertCourses');

Route::get('/users/dashboard', 'UserController@dashboard');

Route::get('/courses/{id}', 'CourseController@show');
Route::put('/courses/answers', 'CourseEnrollmentController@update');
Route::get('/certificate/{id}', 'UserController@downloadIMG');

Route::get('admin',function(){
    if(Gate::allows('admin-only', Auth::user())){
        return view('admin');
    }else{
        return view('auth.login');
    }
});

Route::get('/search', 'SearchController@search');
Route::get('/admin_requests', 'CourseEnrollmentController@index');
Route::put('/admin_request/update', 'CourseEnrollmentController@updateEnrollment');
Route::delete('/request_delete', 'CourseEnrollmentController@destroy');
Route::get('/admin-courses/courses/{id}', 'CourseController@showCourseAdmin');
Route::put('/admin-courses/courses/{id}', 'CourseController@update');

Route::put('/admin-courses/courses/{id}/questions/{id_question}', 'QuestionController@update');
Route::post('/admin-courses/courses/{id}/questions_store', 'QuestionController@store');
Route::get('/admin-courses/courses/{id}/questions', 'QuestionController@index');

Route::post('/admin-courses/courses/{id}/questions/{id_question}/options_store', 'OptionQuestionController@store');
Route::put('/admin-courses/courses/{id}/questions/{id_question}/options_update', 'OptionQuestionController@update');

Route::put('/admin-courses/courses/{id}/lessons/{id_lesson}', 'LessonController@update');
Route::post('/admin-courses/courses/{id}/lessons_store', 'LessonController@store');
Route::get('/admin-courses/courses/{id}/lessons', 'LessonController@index');

// Route::get('image-upload', 'ImageUploadController@imageUpload')->name('image.upload');
// Route::post('image-upload', 'ImageUploadController@imageUploadPost')->name('image.upload.post');


