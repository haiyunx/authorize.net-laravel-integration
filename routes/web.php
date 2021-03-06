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

Route::get('/', 'PaymentsController@create')->name('payments.home');
Route::get('/show', 'PaymentsController@show')->name('payments.show');
Route::post('/store', 'PaymentsController@store')->name('payments.store');
