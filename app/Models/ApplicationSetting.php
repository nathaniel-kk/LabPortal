<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationSetting extends Model
{
    protected $table = "application_setting";
    public $timestamps = true;
    protected $primaryKey = 'setting_id';

    /**
     * 数据展示
     * @param $id
     * @param $state
     * @return |null
     */
    public static function websiteState($id,$state){

        try {
            if($id == null){
                return $data = null;
            }else{ if($state == 1){
                $data = self::where('setting_id',$id)
                    ->update(['setting_status' => 0]);
            }else{
                $data =  self::where('setting_id',$id)
                    ->update(['setting_status' => 1]);
            }}
            return $data;
        } catch(\Exception $e){
            logError('查找用户错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * @return |null
     * 获取系统本次运行时间
     */
    public static function duration(){
        try{
            $data = self::get('created_at');
            return $data;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * @return |null
     * 获取本次报名人次信息
     */
    public static function signsum(){
        try{
            $data = self::get('created_at');
            return $data;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }

}

