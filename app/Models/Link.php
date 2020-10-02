<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = "link";
    public $timestamps = true;
    protected $primaryKey = 'link_id';
    protected $guarded = [];


    public static function friendAdd($request){
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $path = md5(time() . rand(1000, 9999)) .
                '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move('./public', $path);

            $data = $request->all();
            $data['avatar'] = './public' . $path;

            try {
                $friend= Link::create([
                    'tx_url' => $data['avatar'],
                    'priority' => $data['priority'],
                    'blog_url' => $data['blog_url'],
                    'produce' => $data['produce'],
                ]);
            } catch (\Exception $e) {
                logError('错误',[$e->getMessage()]);
            }
            return $friend;
        }
    }

    public static function friendDelete($friend){

        try {
            $data = Link::where('link_id', $friend)->delete();
        } catch (\Exception $e) {
            logError('错误',[$e->getMessage()]);
        }
        return $data;

    }


    public static function friendAlter($request){
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $path = md5(time() . rand(1000, 9999)) .
                '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move('./public', $path);

            $data = $request->all();
            $data['avatar'] = './public' . $path;

            try {
                $data =  Link::where('link_id', $data['link_id'])->update([
                    'tx_url' => $data['avatar'],
                    'priority' => $data['priority'],
                    'blog_url' => $data['blog_url'],
                    'produce' => $data['produce']
                ]);
            } catch (\Exception $e) {
                logError('错误',[$e->getMessage()]);
            }
        }
        return $data;
    }


    public static function friendShow(){
        $friend = Link::select(['name','tx_url','produce','blog_url'])->paginate(6);
        return $friend;
    }


    public static function friendBack($request){
        $data = $request->all();
        $friend = Link::where('link_id',$data['link_id'])->pluck('tx_url','priority','produce','blog_url')->first();
        return $friend;

    }
}
