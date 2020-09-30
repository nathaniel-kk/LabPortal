<?php

namespace App\Models;

use App\Models\Censor;
use Illuminate\Database\Eloquent\Model;
class Article extends Model
{
    protected $table = "article";
    public $timestamps = true;
    protected $primaryKey = 'article_id';

    /**
     * 文章管理页面数据展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @return array
     */
    Public static function articleSelect(){
        try{
            //先得到关键字
            $words=Censor::pluck('word');
            $datas = [];
            $flag = 0;
            for($i = 0;$i<count($words);$i++) {
                $word = $words[$i];
                $res = self::select('article_id','title','neirong')
                    ->where('neirong','like','%'.$word.'%')
                    ->orWhere('title','like','%'.$word.'%')
                    ->get();
                if(!empty($res[0]->neirong)){
                    for($x = 0;$x < count($res);$x++) {
                        $datas[$flag] = $res[$x];
                        $flag++;
                    }
                }
            }
            return array_unique($datas);
        } catch(\Exception $e){
            logError('查询评论失败！',null,'error',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 删除文章
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $article_id
     * @return array
     */
    Public static function articleDel($article_id){
        try {
            $data=self::where('article_id',$article_id)
                ->delete();
            return $data;
        }catch(\Exception $e){
            logError('删除文章错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 文章管理页面查看文章的页面展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $article_id
     * @return array
     */
    Public static function articleSelectInfo($article_id){
        try {
            $data=self::where('article_id',$article_id)
                ->select('title','neirong','information_id')
                ->get();
            return $data;
        }catch(\Exception $e){
            logError('查看文章错误',[$e->getMessage()]);
            return null;
        }
    }
}
