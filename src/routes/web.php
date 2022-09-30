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

//トップページ
Route::get('/', function () {
    return view('top.index');
});

//クイズページ
Route::get('/quiz', 'QuestionsController@show_questions');


//scss
Route::get('scss', function () {
    return view('for-scss');
});

// ユーザー認証  ユーザー登録を削除
Auth::routes(['register' => false]);

// 管理画面（ログイン）
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin/login', 'LoginController@getAuth');
// Route::post('/admin/login', 'LoginController@postAuth');

// 管理画面（クイズ）
Route::get('/admin', 'QuestionsController@show_admin')
->middleware('auth');
