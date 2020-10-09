<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "article";
    public $timestamps = true;
    protected $primaryKey = 'article_id';

    /**
     * @return |null
     * 查询文章总量
     */
    public static function showaricle(){
        try{
            $data = Article::get('article_id')->count();
            return $data;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }


    /**
     * @param $bianhao3
     * @return |null
     * 获取表中最高评论的title和用户id
     */
    public static function pinglunshuju($bianhao3){
        try{
            $data = self::where('article_id','=',$bianhao3)
                ->select('information_id','title')
                ->get();
            return $data;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }
}

