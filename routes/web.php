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

Route::redirect('/','/post');

Route::get('/erd', function () {
    return view('erd');
});
Route::get('/doc', function () {
    return view('doc');
});

Route::resource('/post', 'postcontrol');
Route::get('/showUsers', 'postcontrol@users');
Route::get('/recents', 'postcontrol@recent');


Route::post('post/comment', 'postcontrol@addcomments');
Route::post('/post/comment/delete', 'postcontrol@delcomments');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
