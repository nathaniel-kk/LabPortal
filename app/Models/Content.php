<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = "content";
    public $timestamps = true;
    protected $primaryKey = 'nb_id';

    //获取轮播图
    Public static function uploadPic()
    {
        try {
            dd(123);
            $data = self::where('nb_id', $nb_id)
                ->pluck('nb_id', 'pic_url')
                ->first();

            return $data;

        } catch (\Exception $e) {
            logError('获取失败', [$e->getMessage()]);
        }
    }

    //获取新闻标题
    Public static function getTitle()
    {
        try {
            $data = self::where('nb_id')
                ->pluck('title', 'created_at', 'nb_id')
                ->first();
            return $data;
        } catch (\Exception $e) {
            logError('获取失败', [$e->getMessage()]);
        }
    }

    //获取历届优秀成员
    Public static function getMembers()
    {
        try {
            $data = self::where('member_id')
                ->pluck('name', 'priority', 'member_url', 'member_id')
                ->first();
            return $data;
        } catch (\Exception $e) {
            logError('获取失败', [$e->getMessage()]);
        }
    }

    //友链
    public static function getDlink($link_id, $name)
    {
        try {
            $data = Content::create([
                'link_id' => $link_id,
                'name' => $name
            ]);
            return $data;
        } catch (\Exception $e) {
            logError('获取失败', [$e->getMessage()]);
            return null;
        }
    }


    //返回实验新闻/实验室公告/聚焦实验室内容
    public static function getNew($class_id)
    {
        try {
            $result = self::join('news_bulletin_classfy', 'news_bulletin_classfy.class_id')
                ->select('title', 'neirong', 'created_at', 'priority')
                ->where('class_id', '=', $class_id)
                ->get();
            return $result;
        } catch (\Exception $e) {
            logError('获取失败', [$e->getMessage()]);
            return null;
        }
    }
}

