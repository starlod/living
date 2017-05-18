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

Route::get('/', 'MoviesController@index')->name('home');

Route::get('fate/holy_grail_war', function () {
    return view('fate.holy_grail_war');
});

Route::get('fate/servant', function () {
    return view('fate.servant');
});

Route::get('/movies', 'MoviesController@index')->name('movies.index');
Route::get('/movies/create', 'MoviesController@create')->name('movies.create');
Route::get('/movies/{id}', 'MoviesController@show')->name('movies.show');
Route::post('/movies', 'MoviesController@store')->name('movies.store');
Route::get('/movies/{id}/edit', 'MoviesController@edit')->name('movies.edit');
Route::put('/movies/{id}', 'MoviesController@update')->name('movies.update');
Route::delete('/movies/{id}', 'MoviesController@destroy')->name('movies.destroy');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');
