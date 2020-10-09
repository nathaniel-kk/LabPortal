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
Route::prefix('member')->namespace('Admin\MemberManage')->group(function(){
   Route::post('accountadd','MemberController@accountAdd');//添加用户
    Route::get('accountstate','MemberController@accountState');//禁用操作
    Route::get('accountquery','MemberController@accountQuery');//用户查询
   Route::get('accountexhibition','MemberController@accountExhibition');//数据展示
});

Route::prefix('sign')->namespace('Admin\MemberManage')->group(function (){
    Route::get('signexhibition','SignController@signExhibition');//数据展示
    Route::get('signquery','SignController@signQuery');//查询
    Route::get('signdetails','SignController@signDetails');//详情展示
    Route::post('signadd','SignController@signAdd');//增加用户

});

Route::prefix('web')->namespace('Admin\MemberManage')->group(function (){
    Route::get('websitestate','SignController@websiteState');//总禁用
});
