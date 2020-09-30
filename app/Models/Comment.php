<?php

namespace App\Models;

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
            return null;
        }
    }
}
