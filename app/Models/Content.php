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

    protected $fillable = ['title','priority','neirong','p_url'];
    protected $guarded = [];

    /**
     * @param $request
     * @return |null
     * 公告内容修改
     */
    public static function noticeupdate2($request){
        try{
            $p_url = 0;
            $nb_id = $request->get('nb_id');
            //上传
            //判断文件是否正常
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $path = md5(time() . rand(1000, 9999)) .
                    '.' . $request->file('avatar')->getClientOriginalExtension();
                $request->file('avatar')->move('./public', $path);
                $p_url = './public' . $path;
            }
            $data = self::where('nb_id','=',$nb_id)
                ->update(
                    [
                        'title' => $request->get('title'),
                        'neirong' =>$request->get('neirong'),
                        'priority' =>$request->get('priority'),
                        'p_url' =>$p_url,
                        'updated_at'=>now()
                    ]
                );
            return $data;
        }catch (Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 连接content和news bulletin manage
     */
    public static function zhanshi(){
        try{
            $data = self::Join('news_bulletin_manage','content.nb_id','news_bulletin_manage.nb_id')
                ->select('content.nb_id','content.title','content.neirong','news_bulletin_manage.class_id','news_bulletin_manage.status','content.priority')
                ->paginate(3);
            return $data;
        }catch (Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }

    }

    /**
     * @return |null
     * 连接content和news bulletin manage
     */
    public static function zhanshi1($title){
        try{
            $data = self::Join('news_bulletin_manage','content.nb_id','news_bulletin_manage.nb_id')
                ->where('content.title','like','%'.$title.'%')
                ->select('content.nb_id','content.title','content.neirong','news_bulletin_manage.class_id','news_bulletin_manage.status','content.priority')
                ->get();
            return $data;
        }catch (Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }
    public static function zhanshidange($nb_id){
        try{
            $data = self::Join('news_bulletin_manage','content.nb_id','news_bulletin_manage.nb_id')
                ->where('content.nb_id','=',$nb_id)
                ->select('content.title','content.neirong','news_bulletin_manage.class_id','content.priority',
                    'content.p_url')
                ->get();
            return $data;
        }catch (Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
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
    /**
     *
     */
    public static function add($title,$neirong,$priority,$p_url){
        try{
            $data =self::create(
                [
                    'title' => $title,
                    'neirong'=> $neirong,
                    'priority' =>$priority,
                    'p_url'=>$p_url
                ]
            );
            return $data;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }
}

