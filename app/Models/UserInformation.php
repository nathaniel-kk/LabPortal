<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class UserInformation extends Model
{
    protected $table = "user_information";
    public $timestamps = true;
    protected $primaryKey = 'id';

    public static function getid(){
        try{
            $data = self::get('id')->count();
            return $data;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }

    public static function zhucenum($time2){
        try{
            $data = self::where('created_at','>=',$time2)
                ->select('id')
                ->count();
            return $data;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }

}

