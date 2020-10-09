<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = "application";
    public $timestamps = true;
    protected $primaryKey = 'application_id';

    /**
     * 查询
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
