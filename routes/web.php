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

Route::middleware(['role:admin'])->group(function () {
    Route::get('book/verify-page/{id}', 'BookController@verifyPage')->name('book.verifyPage');
    Route::get('/book/reject/{id}', 'BookController@reject')->name('book.reject');
    Route::get('/book/verify/{id}', 'BookController@verify')->name('book.verify');
    Route::get('/book/pending', 'BookController@pending')->name('book.pending');
    Route::get('/user/get-data', 'UserController@getData')->name('user.getData');
    Route::get('/user/reset-password/{id}', 'UserController@resetPassword')->name('user.resetPassword');
    Route::resource('/user', 'UserController');
});

Route::get('/book/get-data-pending', 'BookController@getDataPending')->name('book.getDataPending');
Route::get('/book/get-data', 'BookController@getData')->name('book.getData');
Route::resource('/book', 'BookController');