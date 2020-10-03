<?php

namespace App\Http\Controllers\LabHome;

use App\Http\Controllers\Controller;
use App\Http\Requests\LabHome\AddUserRequest;
use App\Models\Application;
use App\Models\UserInformation;


class AdminController extends Controller
{
     /**
      * 报名信息添加
      * @author ZhangJinJin <github.com/YetiSui>
      * @param [int]$application_id,[string]$name,$sex,$email,$class,$self_introduce,$batch_num
      * @return array
      */
    Public function addUser(AddUserRequest $request){
       $application_id = $request->input('application_id');
        $name = $request->input('name');
        $sex = $request->input('sex');
        $email = $request->input('email');
        $class = $request->input('class');
        $self_introduce = $request->input('self_introduce');
        $data = Application::addUser($application_id,$name,$sex,$email,$class,$self_introduce);
        $date = UserInformation::addUser($application_id);

        return $data&&$date?
            json_success('成功',null,200):
            json_fail('失败',null,100);
    }
}

