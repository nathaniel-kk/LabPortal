<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Censor extends Model
{
    protected $table = "censor";
    public $timestamps = true;
    protected $primaryKey = 'censor_id';

    /**
     * 审查关键字页面敏感词展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @return array
     */
    Public static function reviewSelect(){
        try {
            $data = self::select('censor_id','word')
            ->get();
            return $data;
        } catch(\Exception $e){
            logError('获取审查关键字信息错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 删除审查关键字
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param int $censor_id
     * @return array
     */
    Public static function reviewDel($censor_id){
        try {
            $data=self::where('censor_id',$censor_id)
                ->delete();
            return $data;
        }catch(\Exception $e){
            logError('删除审查关键字错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 新增审查关键字
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $word
     * @return array
     */
    Public static function reviewAdd($word){
        try {
            $data=self::insert([
                'word'=>$word,
            ]);
            return $data;
        }catch(\Exception $e){
            logError('新增审查关键字错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 文章和评论管理页面的当前审查关键字展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @return array
     */
    Public static function reviewSelectInfo(){
        try {
            $data = self::select('word')
                ->get();
            return $data;
        } catch(\Exception $e){
            logError('获取审查关键字信息错误',[$e->getMessage()]);
            return null;
        }
    }
}
