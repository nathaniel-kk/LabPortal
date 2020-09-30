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
            return null;
        }
    }
}
