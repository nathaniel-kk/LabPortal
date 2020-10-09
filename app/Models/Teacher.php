<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teacher";
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $guarded = [];


    public static function teacherAdd($request)
    {
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $path = md5(time() . rand(1000, 9999)) .
                '.' . $request->file('avatar')->getClientOriginalExtension();

            $request->file('avatar')->move('./public', $path);

            $data = $request->all();

            $data['avatar'] = './public' . $path;

            try {
               $teacher = Teacher::create([
                    'name' => $data['name'],
                    'priority' => $data['priority'],
                    't_url' => $data['avatar'],
                ]);
            } catch (\Exception $e) {
                logError('错误',[$e->getMessage()]);
            }
         return $teacher;
        }
    }


    public static function teacherAlter($request){
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $path = md5(time() . rand(1000, 9999)) .
                '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move('./public', $path);

            $data = $request->all();
            $data['avatar'] = './public' . $path;
            try {
               $teacher =  Teacher::where('id', $data['id'])->update([
                    't_url' => $data['avatar'],
                    'priority' => $data['priority'],
                    'name' => $data['name'],
                ]);
            } catch (\Exception $e) {
                logError('错误',[$e->getMessage()]);
            }
            return $teacher;
        }
    }


    public static function teacherDelete($teacher){
        try {
            $data = Teacher::where('id', $teacher)->delete();
        } catch (\Exception $e) {
            logError('错误',[$e->getMessage()]);
        }
        return $data;
    }


    public static function teacherShow(){
        $teacher = Teacher::select(['name','t_url','profession'])->paginate(6);
        return $teacher;
    }

    public  static function teacherBack($id){

        return  Teacher::where('id',$id)->pluck('t_url','priority','name')->first();

    }

}
