<?php

namespace App\Models;

use App\Models\Censor;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";
    public $timestamps = true;
    protected $primaryKey = 'comment_id';

    public static function bianhao(){
        try{
            $data = self::select('article_id')
                ->get();
            return $data;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
    /**
     * 评论管理页面评论展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @return array
     */
    Public static function commSelect(){
        try{
            //先得到关键字
            $words=Censor::pluck('word');
            $datas = [];
            $flag = 0;
            for($i = 0;$i<count($words);$i++) {
                $word = $words[$i];
                $res = self::select('comment_id','information_id','comment_content')
                    ->where('comment_content','like','%'.$word.'%')
                    ->get();
                if(!empty($res[0]->comment_content)){
                    for($x = 0;$x < count($res);$x++) {
                        $datas[$flag] = $res[$x];
                        $flag++;
                    }
                }
            }
            return array_unique($datas);
            // return array_unique($res);
        } catch(\Exception $e){
            logError('查询评论失败！',null,'error',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * @return |null
     * 获取文章编号
     */
    public static function wenzhangbianhao(){
        try{
            $data = self::select('article_id')
                ->groupBy('article_id')
                ->pluck('article_id');
            return $data;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
     * 评论管理页面删除评论
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $comment_id
     * @return array
     */
    Public static function commDel($comment_id){
        try {
            $data=self::where('comment_id',$comment_id)
                ->delete();
            return $data;
        }catch(\Exception $e){
            logError('删除评论错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * @param $bianhao2
     * @return |null
     * 查找评论编号
     */
    public static function pinglunbianhao($bianhao2){
        try{
            $data = self::where('article_id','=',$bianhao2)
                ->select('comment_id')
                ->count();
            return $data;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
     * 评论管理页面查看评论
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $comment_id
     * @return array
     */
    Public static function commSelectInfo($comment_id){
        try {
            $data = self::Join('article','comment.article_id','=','article.article_id')
                ->where('comment_id',$comment_id)
                ->select('article.title','comment.comment_content','comment.information_id')
                ->get();
            return $data;
        } catch(\Exception $e){
            logError('获取查看评论信息错误',[$e->getMessage()]);
            return null;
        }
    }
}
