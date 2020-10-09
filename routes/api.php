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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('auth')->namespace('Auth')->group(function () {
    Route::post('login', 'AuthController@login'); //登陆
    Route::post('logout', 'AuthController@logout'); //退出登陆
    Route::post('refresh', 'AuthController@refresh'); //刷新token
    Route::post('register', 'AuthController@registered'); //刷新token
});*/


/**
 * caiwenpn
 */
Route::prefix('/admin/pagecontent')->namespace('Admin\PageContent')->group(function () {

    Route::get('labshow','LabController@labShow');
    Route::post('labedit','LabController@labEdit');


    Route::get('teachershow','PersonController@teacherShow');
    Route::post('teacheradd','PersonController@teacherAdd');
    Route::post('teacherback','PersonController@teacherBack');
    Route::post('teacheralter','PersonController@teacherAlter');
    Route::post('teacherdelete','PersonController@teacherDelete');

    Route::get('studentshow','PersonController@studentShow');
    Route::post('studentadd','PersonController@studentAdd');
    Route::post('studentback','PersonController@studentBack');
    Route::post('studentalter','PersonController@studentAlter');
    Route::post('studentdelete','PersonController@studentDelete');


    Route::get('friendshow','PersonController@friendShow');
    Route::post('friendadd','PersonController@friendAdd');
    Route::post('friendback','PersonController@friendBack');
    Route::post('frienddelete','PersonController@friendDelete');
    Route::post('friendalter','PersonController@friendAlter');


});
