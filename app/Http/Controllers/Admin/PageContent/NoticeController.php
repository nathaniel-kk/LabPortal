<?php
namespace App\Http\Controllers\Admin\PageContent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageContent\Demo1Request;
use App\Http\Requests\Admin\PageContent\Demo2Request;
use App\Models\BulletinManage;
use App\Models\Content;
use App\Models\NewsBulletinManage;
use Illuminate\Http\Request;
use League\CommonMark\Extension\TableOfContents\Node\TableOfContents;
//公告管理
class NoticeController extends  Controller
{
    /**
     * @author DuJingWen <github.com/DJWKK>
     * @return \Illuminate\Http\JsonResponse
     * 公告内容展示
     */
    public function NoticeSum(){
        $data = Content::zhanshi();
        return $data?
            json_success('查询公告内容成功!',$data,200) :
            json_fail('查询公告内容失败!',null,100);
    }

    /**
     * @author DuJingWen <github.com/DJWKK>
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 公告内容状态修改
     */
    public function NoticeStatus(Demo2Request $request){
        $id = $request->get('nb_id');
        $date = NewsBulletinManage::noticestatus1($id);
        $data = NewsBulletinManage::noticestatus2($id,$date);
        return $data?
            json_success('修改状态成功!',$data,200) :
            json_fail('修改态失败!',null,100);
    }
    /**
     * @author DuJingWen <github.com/DJWKK>
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 公告内容查询
     */
    public function NoticeSelect(Demo1Request $request){
        $title = $request->get('title');
        $data = Content::zhanshi1($title);
        return $data?
            json_success('查询一条公告成功!',$data,200) :
            json_fail('查询一条公告失败!',null,100);
    }
    /**
     * @author DuJingWen <github.com/DJWKK>
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 公告内容修改（先回显）
     */
    public function NoticeUpdate1(Demo2Request $request){
        $nb_id = $request->get('nb_id');
        $data = Content::zhanshidange($nb_id);
        return $data?
            json_success('查询一条公告成功!',$data,200) :
            json_fail('查询一条公告失败!',null,100);
    }
    /**
     * @author DuJingWen <github.com/DJWKK>
     * @param Demo2Request $request
     * @return \Illuminate\Http\JsonResponse
     * 公告内容修改
     */
    public function NoticeUpdate2(Demo2Request $request){
        $data = Content::noticeupdate2($request);
        $date= NewsBulletinManage::noticeupdate2($request);
        return $data&&$date?
            json_success('修改公告成功!',null,200) :
            json_fail('修改公告失败!',null,100);
    }
}
