<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationSetting extends Model
{
    protected $table = "application_setting";
    public $timestamps = true;
    protected $primaryKey = 'setting_id';
    /**
     * 状态
     * @param $id
     * @param $state
     * @return |null
     */
    public static function websiteState($id,$state){
        try {
            if($state == 1){
                $data = self::where('setting_id',$id)
                    ->update(['setting_status' => 0]);
            }else{
                $data =  self::where('setting_id',$id)
                    ->update(['setting_status' => 1])
                    ->get();
            }
            return $data;
        } catch(\Exception $e){
            logError('查找用户错误',[$e->getMessage()]);
            return null;
        }
    }
}
