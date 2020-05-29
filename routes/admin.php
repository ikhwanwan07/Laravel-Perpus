<?php


Route::get('/', 'HomeController@index')->name('dashboard');
Route::get('/author', 'AuthorController@index')->name('author.index');
Route::get('/author/create', 'AuthorController@create')->name('author.create');
Route::post('/author/store', 'AuthorController@store')->name('author.store');
Route::get('/author/{author}/edit', 'AuthorController@edit')->name('author.edit');
Route::put('/author/{author}/update', 'AuthorController@update')->name('author.update');
Route::delete('/author/{author}/delete', 'AuthorController@destroy')->name('author.delete');
Route::get('/author/data', 'DataController@author')->name('author.data');
Route::get('/book/data', 'DataController@book')->name('book.data');
Route::get('/borrowed/data', 'DataController@borrowed')->name('borrowed.data');
Route::get('/borrowedHistory/data', 'DataController@borrowedHistory')->name('borrowedHistory.data');
Route::get('/borrow', 'BorrowController@index')->name('borrow.index');
Route::get('/borrow/history', 'BorrowController@history')->name('borrow.history');
Route::put('/borrow/{borrowHistory}/return', 'BorrowController@return')->name('borrow.return');
Route::resource('book', 'BookController');
