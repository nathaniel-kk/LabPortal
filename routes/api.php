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

/**
 * @author  ZhangJinJIn <github.com/YetiSui>
 */
Route::prefix('labhome')->namespace("LabHome")->group(function (){
    Route::post('login', 'TestController@login'); //登陆
    Route::post('adduser','AdminController@addUser');  //用户报名信息
    Route::get('uploadpic','HomeController@uploadPic');  //获取轮播图
    Route::get('gettitle','HomeController@getTitle');  //获取新闻标题
    Route::get('getmembers','HomeController@getMembers');  //获取历届成员
    Route::get('getlink','HomeController@getLink');  //友链展示
    Route::get('getnew','HomeController@getNew');  //实验室新闻/实验室公告/聚焦实验室
    Route::get('labintroduce','HomeController@labIntroduce');  //实验室介绍
    Route::get('guidteacher','HomeController@guidTeacher');  //指导老师
    Route::get('labenvironment','HomeController@labEnvironment');  //实验室环境
    Route::get('labarchited','HomeController@labarchited');  //组织架构
    Route::get('labaspect','HomeController@labAspect');  //实验室方向
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
/**
 * @author DuJingWen <github.com/DJWKK>
 */
Route::prefix('/admin')->namespace('Admin')->group(function(){
    Route::get('/showregister','WebController@showregister');
    Route::get('/showarticle','WebController@showarticle');
    Route::get('/givelike','WebController@givelike');
    Route::get('/hotsearch','WebController@hotsearch');
    Route::get('/duration','WebController@duration');
    Route::get('/comment','WebController@comment');
    Route::get('/signsum','WebController@signsum');
});
/**
 * @author DuJingWen <github.com/DJWKK>
 */
Route::prefix('/admin/pagecontent')->namespace('Admin\PageContent')->group(function(){
    Route::get('/noticesum','NoticeController@NoticeSum');
    Route::get('/noticestatus','NoticeController@NoticeStatus');
    Route::get('/noticeselect','NoticeController@NoticeSelect');
    Route::get('/noticeupdate1','NoticeController@NoticeUpdate1');
    Route::post('/noticeupdate2','NoticeController@NoticeUpdate2');
    Route::post('/publish','PublishController@Publish');
});
