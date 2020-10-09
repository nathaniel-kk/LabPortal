<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $table = "user_information";
    public $timestamps = true;
    protected $primaryKey = 'id';

    /**
     * 查找
     * @param $query
     * @return |null
     */
   public static function accountQuery($query){
       try {
          $data = UserInformation::join('login','information_id','login_id')
              ->select('login.login_date','user_information.nichen',
              'user_information.sex','user_information.name','user_information.id'
              ,'login.login_status')
              ->where('information_id',$query)
              ->orwhere('nichen',$query)
              ->get();
           return $data;
       } catch(\Exception $e){
           logError('查找用户错误',[$e->getMessage()]);
           return null;
       }
   }

    /**
     * 增加用户
     * @param $login_id
     * @return |null
     */
    public static function accountAdd($login_id){
        try {
            $data =  UserInformation::insert([
                'information_id' => $login_id,
            ]);
            return $data;
        } catch(\Exception $e){
            logError('新增用户信息错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 数据展示
     * @return |null
     */
    public static function  signExhibition(){
        try {
            $data =  UserInformation::select(['name','information_id','sex','class','produce'])
            ->get();
            return $data;
        } catch(\Exception $e){
            logError('展示用户信息错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 展示用户数据
     * @param $login_id
     * @return |null
     */

    public static function signDetails($login_id){
        try {
            $data =  UserInformation::where('information_id',$login_id)
                ->get();
            return $data;
        } catch(\Exception $e){
            logError('展示用户信息错误',[$e->getMessage()]);
            return null;
        }

    }

    /**
     * 新增用户
     * @param $name
     * @param $id
     * @param $sex
     * @param $self
     * @param $class
     * @return |null
     */
    public static function signAdd($name,$id,$sex,$self,$class){
        try {
            $data =  UserInformation::insert([
                'information_id' => $id,
                'name' => $name,
                'sex' => $sex,
                'produce' => $self,
                'class' => $class,
            ]);
            return $data;
        } catch(\Exception $e){
            logError('新增用户信息错误',[$e->getMessage()]);
            return null;
        }
    }
}
