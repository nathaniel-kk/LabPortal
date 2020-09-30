<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teacher";
    public $timestamps = true;
    protected $primaryKey = 'id';

    //指导老师
    public static function guidTeacher(){
        try{
            $result = self::select('name','t_url','profession')->get();
            //dd($result);
            return $result;
        } catch (\Exception $e){
            logError('获取失败', [$e->getMessage()]);
            return null;
        }
    }
}
