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


Route::get('/', 'BooksController@index');
Route::post('/', 'BooksController@store')->name('add_books');
Route::get('/books', 'BooksController@show')->name('saved_books');
Route::post('/books', 'BooksController@destroy')->name('delete_books');

