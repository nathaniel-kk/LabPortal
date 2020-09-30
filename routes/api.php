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
Route::prefix('auth')->namespace('Auth')->group(function () {
    Route::post('login', 'AuthController@login'); //登陆
    Route::post('logout', 'AuthController@logout'); //退出登陆
    Route::post('refresh', 'AuthController@refresh'); //刷新token
    Route::post('register', 'AuthController@registered'); //刷新token
});

Route::prefix('/admin')->namespace('Admin')->group(function(){
    Route::get('/showregister','WebController@showregister');
    Route::get('/showarticle','WebController@showarticle');
    Route::get('/givelike','WebController@givelike');
    Route::get('/hotsearch','WebController@hotsearch');
    Route::get('/duration','WebController@duration');
    Route::get('/comment','WebController@comment');
    Route::get('/signsum','WebController@signsum');
});

Route::prefix('/admin/pagecontent')->namespace('Admin\PageContent')->group(function(){
    Route::get('/noticesum','NoticeController@NoticeSum');
    Route::get('/noticestatus','NoticeController@NoticeStatus');
    Route::get('/noticeselect','NoticeController@NoticeSelect');
    Route::get('/noticeupdate1','NoticeController@NoticeUpdate1');
    Route::post('/noticeupdate2','NoticeController@NoticeUpdate2');
    Route::post('/publish','PublishController@Publish');
});
