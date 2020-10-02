<?php

namespace App\Http\Controllers\Admin\PageContent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageContent\friendAdd;
use App\Http\Requests\Admin\PageContent\friendAlter;
use App\Http\Requests\Admin\PageContent\studentBack;
use App\Http\Requests\Admin\PageContent\studentAdd;
use App\Http\Requests\Admin\PageContent\teacherAdd;
use App\Http\Requests\Admin\PageContent\teacherAlter;
use App\Http\Requests\Admin\Pagecontent\teacherBack;
use App\Models\GoodMember;
use App\Models\Link;
use App\Models\Teacher;
use Illuminate\Http\Request;

/**
 * caiwenpin
 */

class PersonController extends Controller
{

    public function teacherShow(){
//        $teacher = Teacher::select(['name','t_url','profession'])->paginate(6);
//        return $teacher?
//        json_success('成功!',$teacher,200):
//        json_fail('失败!',null,100);


        $teacher = Teacher::teacherShow();
        return $teacher?
            json_success('成功!',$teacher,200):
            json_fail('失败!',null,100);
    }



    public function teacherAdd(teacherAdd $request){
//
//            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
//                $path = md5(time() . rand(1000, 9999)) .
//                    '.' . $request->file('avatar')->getClientOriginalExtension();
//
//                $request->file('avatar')->move('./public', $path);
//
//                $data = $request->all();
//
//                $data['avatar'] = './public' . $path;
//
//                Teacher::create([
//                   'name'=>$data['name'],
//                    'priority'=>$data['priority'],
//                    't_url'=>$data['avatar'],
//                ]);
//                return json_success('成功!',null,200) ;
//            }
//        return json_fail('失败!',null,100);

        $teacher = Teacher::teacherAdd($request);
        return $teacher?
            json_success('成功!',$teacher,200):
            json_fail('失败!',null,100);


    }


    public function teacherBack(teacherBack $request){
//        $teacher = Teacher::select(['t_url','priority','name']);
//        return $teacher?
//            json_success('成功!',$teacher,200):
//            json_fail('失败!',null,100);

        $teacher = $request->input('id');
        $teacher = Teacher::teacherBack($teacher);

        return $teacher?
            json_success('成功!',$teacher,200):
            json_fail('失败!',null,100);
    }





    public function teacherAlter(teacherAlter $request){

        //上传
        //判断文件是否正常
//            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
//                $path = md5(time() . rand(1000, 9999)) .
//                    '.' . $request->file('avatar')->getClientOriginalExtension();
//                $request->file('avatar')->move('./public', $path);
//
//                $data = $request->all();
//                $data['avatar'] = './public' . $path;
//
//
//
//                Teacher::where('id',$data['id'])->update([
//                    't_url'=>$data['avatar'],
//                    'priority'=>$data['priority'],
//                    'name'=>$data['name'],
//                ]);
//                return json_success('成功!',null,200) ;
//            }
//
//        return json_fail('失败!',null,100);
        $teacher = Teacher::teacherAlter($request);
        return $teacher?
            json_success('成功!',$teacher,200):
            json_fail('失败!',null,100);
    }


    public function teacherDelete(Request $request){
//        $teacher = $request->input('id');
//        $data=Teacher::where('id',$teacher)->delete();
//        return $data?
//            json_success('成功!',null,200) :
//            json_fail('失败!',null,100);
        $teacher = $request->input('id');
        $data=Teacher::teacherDelete($teacher);
        return $data?
            json_success('成功!',null,200) :
            json_fail('失败!',null,100);
    }



    public function studentShow(){
//        $student = GoodMember::select(['name','member_url'])->paginate(6);
//        return $student?
//            json_success('成功!',$student,200) :
//            json_fail('失败!',null,100);

        $student = GoodMember::studentShow();
        return $student?
            json_success('成功!',$student,200):
            json_fail('失败!',null,100);
    }


    public function studentAdd(studentAdd $request){

        //上传
        //判断文件是否正常
//            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
//                $path = md5(time() . rand(1000, 9999)) .
//                    '.' . $request->file('avatar')->getClientOriginalExtension();
//                $request->file('avatar')->move('./public', $path);
//
//                $data = $request->all();
//
//                $data['avatar'] = './public' . $path;
//
//                GoodMember::create([
//                    'name'=>$data['name'],
//                    'priority'=>$data['priority'],
//                    'member_url'=>$data['avatar'],
//                ]);
//                return json_success('成功!',null,200) ;
//            }
//            return  json_fail('失败!',null,100);
        $student = GoodMember::studentAdd($request);
        return $student?
            json_success('成功!',$student,200):
            json_fail('失败!',null,100);


    }




    public function studentBack(studentBack $request){
//        $student = $request->all();
//        $member_id = $student['member_id'];
//        echo  $member_id;
//        die();
//        $student = GoodMember::where('member_id',$member_id)->pluck('member_url','priority','name')->first();
//        return $student?
//            json_success('成功!',$student,200):
//            json_fail('失败!',null,100);

        $data = GoodMember::studentBack($request);
        return $data?
            json_success('成功!',$data,200):
            json_fail('失败!',null,100);
    }


    public function studentAlter(Request $request){

        //上传
        //判断文件是否正常
//            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
//                $path = md5(time() . rand(1000, 9999)) .
//                    '.' . $request->file('avatar')->getClientOriginalExtension();
//                $request->file('avatar')->move('./public', $path);
//
//                $data = $request->all();
//                $data['avatar'] = './public' . $path;
//
//                GoodMember::where('member_id',$data['member_id'])->update([
//                    'member_url'=>$data['avatar'],
//                    'priority'=>$data['priority'],
//                    'name'=>$data['name']
//                ]);
//                return json_success('成功!',null,200) ;
//            }
//
//        json_fail('失败!',null,100);

        $student = GoodMember::studentAlter($request);
        return $student?
            json_success('成功!',$student,200):
            json_fail('失败!',null,100);
    }




    public function studentDelete(Request $request){
//        $student = $request->input('member_id');
//
//        $data=GoodMember::where('member_id',$student)->delete();
//        return $data?
//            json_success('成功!',null,200) :
//            json_fail('失败!',null,100);
        $student = $request->input('member_id');

        $data=GoodMember::studentDelete($student);
        return $data?
            json_success('成功!',null,200) :
            json_fail('失败!',null,100);
    }





    public function friendShow(){
//        $friend  = Link::select(['name','tx_url','produce'])->paginate(5);
//        return $friend?
//                json_success('成功!',$friend,200) :
//                json_fail('失败!',null,100);

        $friend = Link::friendShow();
        return $friend?
            json_success('成功!',$friend,200):
            json_fail('失败!',null,100);
    }


    public function friendBack(Request $request){
        $data =Link::friendBack($request);
        return $data?
            json_success('成功!',$data,200):
            json_fail('失败!',null,100);
    }



    public function friendAdd(friendAdd $request)
    {
        //上传
        //判断文件是否正常
//            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
//                $path = md5(time() . rand(1000, 9999)) .
//                    '.' . $request->file('avatar')->getClientOriginalExtension();
//                $request->file('avatar')->move('./public', $path);
//
//                $data = $request->all();
//                $data['avatar'] = './public' . $path;
//
//                Link::create([
//                    'tx_url'=>$data['avatar'],
//                    'priority'=>$data['priority'],
//                    'blog_url'=>$data['blog_url'],
//                    'produce'=>$data['produce'],
//                ]);
//                return json_success('成功!',null,200) ;
//            }
//       return json_fail('失败!',null,100);

        $friend = Link::friendAdd($request);
        return $friend?
            json_success('成功!',null,200) :
            json_fail('失败!',null,100);
    }


    public function friendDelete(Request $request){
//        $link = $request->input('link_id');
//        $data=Link::where('link_id',$link)->delete();
//        return $data?
//            json_success('成功!',null,200) :
//            json_fail('失败!',null,100);

        $friend = $request->input('link_id');
        $data=Link::friendDelete($friend);
        return $data?
            json_success('成功!',null,200) :
            json_fail('失败!',null,100);
    }


    public function friendAlter(friendAlter $request){

        //上传
        //判断文件是否正常
//            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
//                $path = md5(time() . rand(1000, 9999)) .
//                    '.' . $request->file('avatar')->getClientOriginalExtension();
//                $request->file('avatar')->move('./public', $path);
//
//                $data = $request->all();
//                $data['avatar'] = './public' . $path;
//
//                Link::where('link_id',$data['link_id'])->update([
//                    'tx_url'=>$data['avatar'],
//                    'priority'=>$data['priority'],
//                    'blog_url'=>$data['blog_url'],
//                    'produce'=>$data['produce']
//                ]);
//                return json_success('成功!',null,200) ;
//            }
//         return json_fail('失败!',null,100);

        $data = Link::friendAlter($request);
        return $data?
            json_success('成功!',null,200) :
            json_fail('失败!',null,100);
    }



}
