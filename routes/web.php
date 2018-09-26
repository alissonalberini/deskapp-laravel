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


Route::get('/', function () {
    return view('home');
});

Route::get('/form-basic.php', function () {
    return view('form-basic');
});


//Auth::routes();