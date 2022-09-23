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
// Route::get('/quiz', 'ChoicesController@show_choices');


//scss
Route::get('scss', function () {
    return view('for-scss');
});
