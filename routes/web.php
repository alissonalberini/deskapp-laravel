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

Route::get('/form-basic', function () {
    return view('form-basic');
});

Route::get('/basic-table', function () {
    return view('basic-table');
});

//Paginas authenticadas:
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');


Route::get('/users2', 'UserController@index2');

Route::resource('users', 'UserController');
//Route::post('/users/{user}', 'UserController@update')->name('users.update');

