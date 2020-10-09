<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Exception;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Login extends \Illuminate\Foundation\Auth\User implements JWTSubject,Authenticatable
{
    protected $table = "login";
    public $timestamps = true;
    protected $primaryKey = 'login_id';
    protected $fillable = ['login_id', 'password','login_date'];
    protected $hidden = [
        'password',
    ];
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getJWTIdentifier()
    {
        return self::getKey();
    }
    /***
     * 跟新用户登陆时间
     * @param $login_id
     */
    public static function updateDate($login_id){
     try{
         $model = Login::find($login_id);
         $model ->login_date =    now();
         return $model ->save();

     }catch (Exception $e){
         logError("更新用户登陆时间出错！",$e->getMessage());
         return null;
     }
    }


    /**
     * 创建用户
     *
     * @param array $array
     * @return |null
     * @throws \Exception
     */
    public static function createUser($array = [])
    {
        try {
            return self::create($array) ?
                true :
                false;
        } catch (\Exception $e) {
            //\App\Utils\Logs::logError('添加用户失败!', [$e->getMessage()]);
            die($e->getMessage());
            return false;
        }
    }

    /**
     * 增加用户
     * @param $login_id
     * @param $password
     * @return bool
     * @throws \Exception
     */
    public static function accountAdd($login_id,$password){
        try {
            $data =  Login::insert([
                'login_id' => $login_id,
                'password' => $password,
                'login_date'=>now()
            ]);
            return $data;
        } catch(\Exception $e){
            logError('新增用户信息错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 禁用操作
     * @param $login_id
     * @param $login_status
     * @return |null
     */
    public static function accountState($login_id,$login_status){
        try {
            if($login_status == 1){
                $data = self::where('login_id',$login_id)
                    ->update(['login_status' => 0,'login_date'=>now()]);
            }else{
                $data =  self::where('login_id',$login_id)
                    ->update(['login_status' => 1,'login_date'=>now()])
                    ->get();
            }
            return $data;
        } catch(\Exception $e){
            logError('禁用用户错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 数据展示
     * @return |null
     */
    public static function accountExhibition(){
        try {
            $data = Login::join('user_information','login_id','information_id')
                ->select(['login_id','login_date','login_status','nichen','name','sex'])
                ->get();
            return $data;
        } catch(\Exception $e){
            logError('禁用用户错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 增加用户
     * @param $id
     * @return |null
     */
    public static function signAdd($id){
        try {
            $data =  Login::insert([
                'login_id' => $id,
                'login_date'=>now()
            ]);
            return $data;
        } catch(\Exception $e){
            logError('新增用户信息错误',[$e->getMessage()]);
            return null;
        }
    }

}
