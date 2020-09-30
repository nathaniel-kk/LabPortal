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
/**
 * @author ChenMiao <github.com//Yidaaa-u>
 */
Route::prefix('admin/commmanage')->namespace('Admin\CommManage')->group(function () {
    Route::get('reviewselect', 'CommController@reviewSelect'); //审查关键字页面敏感词展示
    Route::post('reviewdel', 'CommController@reviewDel'); //删除审查关键字
    Route::post('reviewadd', 'CommController@reviewAdd'); //新增审查关键字
    Route::get('articleselect', 'CommController@articleSelect'); //文章管理页面数据展示
    Route::post('articledel', 'CommController@articleDel'); //删除文章
    Route::get('articleselectinfo', 'CommController@articleSelectInfo'); //文章管理页面查看文章的页面展示
    Route::get('reviewselectinfo', 'CommController@reviewSelectInfo'); //文章和评论管理页面的当前审查关键字展示
    Route::get('commselect', 'CommController@commSelect'); //评论管理页面评论展示
    Route::post('commdel', 'CommController@commDel'); //评论管理页面删除评论
    Route::get('commselectinfo', 'CommController@commSelectInfo'); //评论管理页面查看评论
});
