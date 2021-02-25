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

//「戻る」ボタンでトップページへ戻る遷移を作る
Route::get('/', 'InquiryController@index')->name('index');


Route::post('inquiry', 'InquiryController@postInquiry')->name('inquiry');

Route::get('confirm', 'InquiryController@showConfirm')->name('confirm');

Route::post('confirm', 'InquiryController@postConfirm')->name('confirm');

//完了画面のコントローラーを指すためのルーティング設定
Route::get('sent', 'InquiryController@showSentMessage')->name('sent');