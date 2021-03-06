<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/wechat_mini/home', 'WechatController@home');
Route::post('/wechat_mini/detail', 'WechatController@detail');
Route::post('/wechat_mini/form', 'WechatController@form');
Route::post('/wechat_mini/verification', 'WechatController@verification');
Route::post('/wechat_mini/sendcode', 'WechatController@sendCode');
