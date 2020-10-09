<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ApplicationSetting;
use App\Models\Article;
use App\Models\Content;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Hot;
use App\Models\SearchList;
use App\Models\UserInformation;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\Date;
//后台主页展示
class WebController extends Controller
{
    /**
     * @author DuJingWen <github.com/DJWKK>
     * @return \Illuminate\Http\JsonResponse
     *查询用户注册量
     */
    public function ShowRegister(){
        $data =UserInformation::getid();
        return $data?
            json_success('查询用户注册量成功!',$data,200) :
            json_fail('查询用户注册量失败!',null,100);
    }
    /**
     * @author DuJingWen <github.com/DJWKK>
     * @return \Illuminate\Http\JsonResponse
     * 查询文章总量
     */
    public function ShowArticle(){
        $data = Article::showaricle();
        return $data?
            json_success('查询文章总量成功!',$data,200) :
            json_fail('查询文章总量失败!',null,100);
    }
    /**
     * @author DuJingWen <github.com/DJWKK>
     * @return \Illuminate\Http\JsonResponse
     * 获取最高点赞信息
     */
    public function GiveLike(){
        $max = Like::givelike();
        $id[0] = Like::givelike2($max);
        $data = Like::dianzan($id[0]);
        return $data?
            json_success('查询最高点赞量成功!',$data,200) :
            json_fail('查询最高点赞量失败!',null,100);
    }
    /**
     * @author DuJingWen <github.com/DJWKK>
     * @return \Illuminate\Http\JsonResponse
     * 获取最高评论量信息
     */
    public function Comment(){
        $num =0;
        $bianhao3 = 0;
        $bianhao = Comment::wenzhangbianhao();
        foreach($bianhao as $value){
            $max = Comment::pinglunbianhao($value);
            if ($num < $max){
                $num = $max;
                $bianhao3 = $value;
            }
        }
        $data = Article::pinglunshuju($bianhao3);
        return $data?
            json_success('查询最高评论量成功!',$data,200) :
            json_fail('查询最高评论量失败!',null,100);

    }
    /**
     * @author DuJingWen <github.com/DJWKK>
     * @return \Illuminate\Http\JsonResponse
     * 获取热门搜索信息
     */
    public function HotSearch(){
        $data = SearchList::hotsearch();
        return $data?
            json_success('获取热门搜索信息成功!',$data,200) :
            json_fail('获取热门搜索信息失败!',null,100);
    }
    /**
     * @author DuJingWen <github.com/DJWKK>
     * @return \Illuminate\Http\JsonResponse
     * 获取系统本次运行时间
     */
    public function Duration(){
        $time = Carbon::now();
        $time2 = ApplicationSetting::duration();
        foreach ($time2 as $value){
            $time3 = $value->created_at;
        }
        $sum = $time ->diff($time3);
        $data = $sum->format('%d天%H小时%i分%s秒');
        return $data?
            json_success('获取本次报名系统运行时长信息成功!',$data,200) :
            json_fail('获取本次报名系统运行时长信息失败!',null,100);
    }
    /**
     * @author DuJingWen <github.com/DJWKK>
     * @return \Illuminate\Http\JsonResponse
     * 获取本次报名人次信息
     */
    public function SignSum(){
        $time2 = ApplicationSetting::signsum();
        foreach ($time2 as $value){
            $time3 = $value->created_at;
        }
        $data = UserInformation::zhucenum($time3);
        return $data?
            json_success('获取本次报名人次信息成功!',$data,200) :
            json_fail('获取本次报名人次信息失败!',null,100);
    }
}
