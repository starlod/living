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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'MoviesController@index')->name('home');

Route::get('/movies', 'MoviesController@index')->name('movies.index');
Route::get('/movies/create', 'MoviesController@create')->name('movies.create');
Route::get('/movies/{id}', 'MoviesController@show')->name('movies.show');
Route::post('/movies', 'MoviesController@store')->name('movies.store');
Route::get('/movies/{id}/edit', 'MoviesController@edit')->name('movies.edit');
Route::put('/movies/{id}', 'MoviesController@update')->name('movies.update');
Route::delete('/movies/{id}', 'MoviesController@destroy')->name('movies.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
