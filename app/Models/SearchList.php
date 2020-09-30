<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Exception;

class SearchList extends Model
{
    protected $table = "search_list";
    public $timestamps = true;
    protected $primaryKey = 's_id';

    /**
     * @param $max
     * @return |null
     * 获取热门搜索信息
     */
    public static function hotsearch(){
        try{
            $data =  self::orderBy('count','desc')
                ->select('word')
                ->get();
            return $data;
        }catch(Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }
}
