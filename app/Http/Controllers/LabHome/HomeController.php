<?php

namespace App\Http\Controllers\LabHome;

use App\Http\Controllers\Controller;
use App\Http\Requests\LabHome\GetDlinkRequest;
use App\Http\Requests\LabHome\GetMembersRequest;
use App\Http\Requests\LabHome\GetNewRequest;
use App\Http\Requests\LabHome\UploadPicRequest;
use App\Models\Content;
use App\Models\Labor;
use App\Models\Teacher;

class HomeController extends Controller
{
    //获取轮播图
    public function uploadPic(UploadPicRequest $request){
            $nb_id = $request->input('nb_id');
            $data = Content::uploadPic($nb_id);

            return $data?
                json_success('成功',$data,200) :
                json_fail('失败',null,100);

       }


    //获取新闻标题
     public function getTitle(UploadPicRequest $request){
              $nb_id = $request->input('nb_id');
              $data = Content::getTitle($nb_id);

              return $data?
                  json_success('成功',$data,200) :
                  json_fail('失败',null,100);
}
    //获取历届成员
     public function getMembers(GetMembersRequest $request){
               $member_id = $request->input('member_id');
               $data = Content::getMembers($member_id);

               return $data?
                   json_success('成功',$data,200) :
                   json_fail('失败',null,100);
     }

     //页面底部友链
     public function getDlink(GetDlinkRequest $request){
             $link_id =$request['link_id'];
             $name =$request['name'];
             $data = Content::getDlink($link_id,$name);

              return $data ?
                  json_success('成功',$data,200) :
                  json_fail('失败',null,100);
     }

     //友链展示
     public  function getLink(GetDlinkRequest $request){
             $link_id = $request['link_id'];
             $name = $request['name'];
             $data = Content::getLink($link_id,$name);

             return $data?
                 json_success('成功',$data,200):
                 json_fail('失败',null,100);
     }

     //实验室新闻/实验室公告/聚焦实验室
    public function getNew(GetNewRequest $request){
        $class_id = $request['class_id'];
        $data = Content::getNew($class_id);

        return $data?
            json_success('成功',$data,200):
            json_fail('失败',null,100);
    }

    //实验室介绍
    public function labIntroduce(){
        $data = Labor::labIntroduce();

        return $data?
            json_success('成功',$data,200):
            json_fail('失败',null,100);
    }

    //指导老师
    public function guidTeacher(){
        $data = Teacher::guidTeacher();
        return $data?
            json_success('成功',$data,200):
            json_fail('失败',null,100);
    }

    //实验室环境
    public function labEnvironment(){
        $data = Labor::labEnvironment();
        return $data?
            json_success('成功',$data,200):
            json_fail('失败',null,100);
    }

    //组织架构
    public function labArchited(){
        $data = Labor::labArchited();
        return $data?
            json_success('成功',$data,200):
            json_fail('失败',null,100);
    }

    //实验室方向
    public function labAspect(){
        $data = Labor::labAspect();
        return $data?
            json_success('成功',$data,200):
            json_fail('失败',null,100);
    }
}
