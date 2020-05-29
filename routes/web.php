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

Route::get('/', 'Frontend\HomeController@index')->name('homepage');
Route::get('/book/{book}', 'Frontend\HomeController@show')->name('book.show');
Route::post('/book/{book}/borrow', 'Frontend\HomeController@borrow')->name('book.borrow')->middleware('auth');





Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
