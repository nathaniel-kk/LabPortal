<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Labor extends Model
{
    protected $table = "labor";
    public $timestamps = true;
    protected $primaryKey = 'labor_id';
    protected $guarded = [];

    public static function LabShow(){
        $lab = Labor::select(['produce','enviroment','architect','direction','pro_url'])->first();
        $web = WebInformation::select(['name','title','footer'])->first();
        $date['pro_url']=$lab['pro_url'];
        $date['produce']= $lab['produce'];
        $date['enviroment']= $lab['enviroment'];
        $date['architect']= $lab['architect'];
        $date['direction']= $lab['direction'];
        $date['name']= $web['name'];
        $date['title']= $web['title'];
        $date['footer']= $web['footer'];
        return $date;
    }

    public static function LabEdit($request){
        $data = $request->all();
        if (($request->hasFile('pro_url') && $request->file('pro_url')->isValid())) {
            $path_1 = md5(time() . rand(1000, 9999)) .
                '.' . $request->file('pro_url')->getClientOriginalExtension();
            $request->file('pro_url')->move('./public', $path_1);
            $data['pro_url'] = './public' . $path_1;
        }

        if (($request->hasFile('env_url') && $request->file('env_url')->isValid())) {
            $path_2 = md5(time() . rand(1000, 9999)) .
                '.' . $request->file('env_url')->getClientOriginalExtension();
            $request->file('env_url')->move('./public', $path_2);
            $data['env_url'] = './public' . $path_2;
        }

        if (($request->hasFile('arc_url') && $request->file('arc_url')->isValid())) {
            $path_3 = md5(time() . rand(1000, 9999)) .
                '.' . $request->file('arc_url')->getClientOriginalExtension();
            $request->file('arc_url')->move('./public', $path_3);
            $data['arc_url'] = './public' . $path_3;
        }

        if (($request->hasFile('dir_url') && $request->file('dir_url')->isValid())) {
            $path_4 = md5(time() . rand(1000, 9999)) .
                '.' . $request->file('dir_url')->getClientOriginalExtension();
            $request->file('dir_url')->move('./public', $path_4);
            $data['dir_url'] = './public' . $path_4;
        }


        try {
            Labor::where('labor_id', $data['labor_id'])->update([
                'produce' => $data['produce'],
                'pro_url' => $data['pro_url'],
                'enviroment' => $data['enviroment'],
                'env_url' => $data['env_url'],
                'architect' => $data['architect'],
                'arc_url' => $data['arc_url'],
                'direction' => $data['direction'],
                'dir_url' => $data['dir_url']
            ]);
            WebInformation::where('id', $data['id'])->update([
                'name' => $data['name'],
                'title' => $data['title'],
                'footer' => $data['footer']
            ]);
        } catch (\Exception $e) {
            logError('错误',[$e->getMessage()]);
        }
        return $data;

    }



    //实验室介绍
    public static function labIntroduce(){
        try{
            $result = self::select('produce','pro_url')->get();
            //dd($result);
            return $result;
        } catch (\Exception $e){
            logError('获取失败', [$e->getMessage()]);
            return null;
        }
    }

    //实验室环境
    public static function labEnvironment(){
        try{
            $result = self::select('enviroment','env_url')->get();
            //dd($result);
            return $result;
        } catch (\Exception $e){
            logError('获取失败', [$e->getMessage()]);
            return null;
        }
    }

    //组织架构
    public static function labArchited(){
        try{
            $result = self::select('architect','arc_url')->get();
            //dd($result);
            return $result;
        } catch (\Exception $e){
            logError('获取失败', [$e->getMessage()]);
            return null;
        }
    }

    //实验室方向
    public static function labAspect(){
        try{
            $result = self::select('direction','dir_url')->get();
            //dd($result);
            return $result;
        } catch (\Exception $e){
            logError('获取失败', [$e->getMessage()]);
            return null;
        }
    }
}
