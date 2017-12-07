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

Route::get('/', 'PostsController@index');
Route::resource('discussions', 'PostsController');
Route::resource('comment', 'CommentsController');

Auth::routes();

Route::get('signup/confirm/{confirm_code}', 'UsersController@confirmEmail')->name('confirm_email');

Route::get('user/avatar', 'UsersController@avatar');
Route::post('avatar', 'UsersController@changeAvatar');
Route::post('/crop/api', 'UsersController@cropAvatar');

Route::post('/post/upload', 'PostsController@upload');