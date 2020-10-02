<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $table = "user_information";
    public $timestamps = true;
    protected $primaryKey = 'id';

    /**
     * 报名信息添加
     * @author ZhangJinJIn <github.com/YetiSui>
     * @param $application_id,$name,$sex,$email,$class,$self_intrduce
     * @return |null
     */
    Public static function addUser($application_id){
        try {
            $date = Application::create([
                'application_id'=>$application_id,

            ]);
            return $date;
        } catch (\Exception $e) {
            logError('新增用户失败',[$e->getMessage()]);

    public static function getid(){
        try{
            $data = self::get('id')->count();
            return $data;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);

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


    public static function zhucenum($time2){
        try{
            $data = self::where('created_at','>=',$time2)
                ->select('id')
                ->count();
            return $data;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);

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
     * 详情
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
     * 增加
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

