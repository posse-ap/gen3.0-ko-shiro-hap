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

Route::resource('/', RecordsController::class)
->middleware('auth');

Route::get('/error', function () {
    return view('error.index');
});

Auth::routes();

// ログアウト
Route::get('/logout', 'Auth\LoginController@logout');

// Route::get('/home', 'HomeController@index')->name('home');