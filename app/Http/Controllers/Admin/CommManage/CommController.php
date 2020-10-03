<?php

namespace App\Http\Controllers\Admin\CommManage;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Censor;
use App\Models\Article;
use App\Http\Requests\Admin\CommManage\reviewDelRequest;
use App\Http\Requests\Admin\CommManage\reviewAddRequest;
use App\Http\Requests\Admin\CommManage\commDelRequest;
use App\Http\Requests\Admin\CommManage\articleDelRequest;
class CommController extends Controller
{
    /**
     * 审查关键字页面敏感词展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @return json
     */
    Public function reviewSelect(){
        $data = Censor::reviewSelect();
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

    /**
     * 删除审查关键字
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param reviewDelRequest $request
     * censor_id 审查关键字编号
     * @return json
     */
    Public function reviewDel(reviewDelRequest $request){
        $censor_id = $request->input('censor_id');
        $data = Censor::reviewDel($censor_id);
        return $data?
            json_success('成功!',null,200) :
            json_fail('失败!',null,100);
    }

    /**
     * 新增审查关键字
     * @author ChenMiao <github.com/Yidaaa-u>
     * @return json
     * @param
     * word 关键字
     * @return json
     */
    Public function reviewAdd(reviewAddRequest $request){
        $word = $request->input('word');
        $data = Censor::reviewAdd($word);
        return $data?
            json_success('成功!',null,200) :
            json_fail('失败!',null,100);
    }

    /**
     * 文章管理页面数据展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @return json
     */
    Public function articleSelect(){
        $data =Article::articleSelect();
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

    /**
     * 删除文章
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param articleDelRequest $request
     * article_id 文章编号
     * @return json
     */
    Public function articleDel(articleDelRequest $request){
        $article_id = $request->input('article_id');
        $data = Article::articleDel($article_id);
        return $data?
            json_success('成功!',null,200) :
            json_fail('失败!',null,100);
    }

    /**
     * 文章管理页面查看文章的页面展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param articleDelRequest $request
     *article_id 文章编号
     * @return json
     */
    Public function articleSelectInfo(articleDelRequest $request){
        $article_id = $request->input('article_id');
        $data = Article::articleSelectInfo($article_id);
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

    /**
     * 文章和评论管理页面的当前审查关键字展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @return json
     */
    Public function reviewSelectInfo(){
        $data = Censor::reviewSelectInfo();
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

    /**
     * 评论管理页面评论展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @return json
     */
    Public function commSelect(){
        $data =Comment::commSelect();
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

    /**
     * 评论管理页面删除评论
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param commDelRequest $request
     * comment_id 评论编号
     * @return json
     */
    Public function commDel(commDelRequest $request){
        $comment_id = $request->input('comment_id');
        $data = Comment::commDel($comment_id);
        return $data?
            json_success('成功!',null,200) :
            json_fail('失败!',null,100);
    }

    /**
     * 评论管理页面查看评论
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param commDelRequest $request
     * comment_id 评论编号
     * @return json
     */
    Public function commSelectInfo(commDelRequest $request){
        $comment_id = $request->input('comment_id');
        $data = Comment::commSelectInfo($comment_id);
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }
}
