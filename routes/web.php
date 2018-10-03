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
//Route::auth();

//Página pública:

Route::get('/', function () {
    return view('home');
});

//Paginas authenticadas:
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/users2', 'UserController@index2')->name('users.index2');
Route::get('/users3', 'UserController@index3')->name('users.index3');

Route::resource('users', 'UserController');

Route::resource('calendar', 'CalendarController');

