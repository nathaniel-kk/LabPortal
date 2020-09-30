<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Labor extends Model
{
    protected $table = "labor";
    public $timestamps = true;
    protected $primaryKey = 'labor_id';

    //实验室介绍
    public static function labIntroduce(){
        try{
            $result = self::select('produce','pro_url')->get();
            //dd($result);
            return $result;
        } catch (\Exception $e){
            logError('获取失败', [$e->getMessage()]);
            return null;
        }
    }

    //实验室环境
    public static function labEnvironment(){
        try{
            $result = self::select('enviroment','env_url')->get();
            //dd($result);
            return $result;
        } catch (\Exception $e){
            logError('获取失败', [$e->getMessage()]);
            return null;
        }
    }

    //组织架构
    public static function labArchited(){
        try{
            $result = self::select('architect','arc_url')->get();
            //dd($result);
            return $result;
        } catch (\Exception $e){
            logError('获取失败', [$e->getMessage()]);
            return null;
        }
    }

    //实验室方向
    public static function labAspect(){
        try{
            $result = self::select('direction','dir_url')->get();
            //dd($result);
            return $result;
        } catch (\Exception $e){
            logError('获取失败', [$e->getMessage()]);
            return null;
        }
    }
}
