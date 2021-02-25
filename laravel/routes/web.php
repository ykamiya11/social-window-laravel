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

/* 初期のルーティング部分は削除、またはコメントアウトします。
Route::get('/', function () {
    return view('welcome');
});
*/

//新しくルーティング情報を追加
Route::get('/', 'InquiryController@index');

//ここから追加
Route::post('inquiry', 'InquiryController@postInquiry')->name('inquiry');
//ここまで追加

//ここから追加
Route::get('confirm', 'InquiryController@showConfirm')->name('confirm');
//ここまで追加