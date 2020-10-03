<?php

namespace App\Models;

use App\Http\Controllers\LabHome\AdminController;
use http\Message;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserInformation;

class Application extends Model
{
    protected $table = "application";
    public $timestamps = true;
    protected $primaryKey = 'application_id';

    /**

     * 报名信息添加
     * @author ZhangJinJIn <github.com/YetiSui>
     * @param $application_id,$name,$sex,$email,$class,$self_intrduce
     * @return |null
     */
    Public static function addUser($application_id,$name,$sex,$email,$class,$self_introduce){
        try {
             $data = Application::create([
                 'application_id'=>$application_id,
                 'name'=>$name,
                 'sex'=>$sex,
                 'email'=>$email,
                 'class'=>$class,
                 'self_introduce'=>$self_introduce,
                 ]);
             return $data;
        } catch (\Exception $e) {
            logError('新增用户失败',[$e->getMessage()]);
            return null;
        }
    }

}

     * 添加
     * @param $query
     * @return |null
     */
    public static function signQuery($query){
        try {
            $data = Application::join('user_information','application_id','information_id')
                ->select('application.name','application.application_id','application.sex',
                    'application.class','application.self_introduce','application.batch_num')
                ->where('information_id',$query)
                ->orwhere('nichen',$query)
                ->get();
            return $data;
        } catch(\Exception $e){
            logError('查找用户错误',[$e->getMessage()]);
            return null;
        }
    }
}

