<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Exception;

class Like extends Model
{
    protected $table = "like";
    public $timestamps = true;
    protected $primaryKey = 'id';

    /**
     * @return |null
     * 获取最高点赞信息
     */
    public static function givelike(){
        try{
            $data = self::max('count');
            return $data;
        }catch(Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }

    public static function givelike2($max){
        try{
            $id = self::where('like.count','=',$max)
                ->pluck('article_id');
            return $id;
        }catch(Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 连接 like和article
     */
    public static function dianzan($id){
        try{
            $data = self::Join('article','article.article_id','like.article_id')
                ->where('article.article_id','=',$id)
                ->select('article.information_id','article.title')
                ->get();
            return $data;
        }catch(Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }
}
