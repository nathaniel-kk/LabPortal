<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsBulletinManage extends Model
{
    protected $table = "news_bulletin_manage";
    public $timestamps = true;
    protected $primaryKey = 'nb_id';
    protected $fillable = ['class_id'];

    public static function noticeupdate2($request){
        try{
            $class_id = $request->get('class_id');
            $nb_id = $request->get('nb_id');
            $date = self::where('nb_id','=',$nb_id)
                ->update(
                    [
                        'class_id' => $class_id,
                        'updated_at'=>now()
                    ]
                );
            return $date;
        }catch (\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }

    public static function noticestatus1($id){
        try{
            $date =self::where('nb_id','=',$id)
                ->pluck('status');
            $data = $date[0] ? 0 : 1;
            return $data;
        }catch (\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }
    public static function noticestatus2($id,$date){
        try{
            $data =self::where('nb_id','=',$id)
                ->update(['status' => $date]);
            return $data;
        }catch (\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * @param $class_id
     * @return |null
     * 内容发布
     */
    public static function add($class_id){
        try{
            $data =self::insert(
                [
                    'class_id' => $class_id,
                    'create_at'=>now()
                ]
            );
            return $data;
        }catch (\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }
}

