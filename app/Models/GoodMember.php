<?php

namespace App\Models;

use App\Http\Requests\Admin\PageContent\studentBack;
use Illuminate\Database\Eloquent\Model;

class GoodMember extends Model
{
    protected $table = "good_members";
    public $timestamps = true;
    protected $primaryKey = 'member_id';
    protected $guarded = [];

    public static function studentAdd($request){
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $path = md5(time() . rand(1000, 9999)) .
                '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move('./public', $path);

            $data = $request->all();

            $data['avatar'] = './public' . $path;

            try {
                $student =  GoodMember::create([
                    'name' => $data['name'],
                    'priority' => $data['priority'],
                    'member_url' => $data['avatar'],
                ]);
            } catch (\Exception $e) {
                logError('错误',[$e->getMessage()]);
            }
            return $student;
        }
    }
    public static function studentDelete($student){
        try {
            $data = GoodMember::where('member_id', $student)->delete();
        } catch (\Exception $e) {
            logError('错误',[$e->getMessage()]);
        }
        return $data;
    }

    public static function studentAlter($request){
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $path = md5(time() . rand(1000, 9999)) .
                '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move('./public', $path);

            $data = $request->all();
            $data['avatar'] = './public' . $path;

            try {
                $student =  GoodMember::where('member_id', $data['member_id'])->update([
                    'member_url' => $data['avatar'],
                    'priority' => $data['priority'],
                    'name' => $data['name']
                ]);
            } catch (\Exception $e) {
                logError('错误',[$e->getMessage()]);
            }

        }
        return $student;


    }
    public static function studentShow(){
        $student = GoodMember::select(['name','member_url'])->paginate(6);
        return $student;
    }


    public static function studentBack($request){
        $data = $request->all();
        $student = GoodMember::where('member_id',$data['member_id'])->pluck('member_url','priority','name')->first();
        return $student;

    }
}
