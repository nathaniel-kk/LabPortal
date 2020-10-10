<?php

namespace App\Http\Controllers\Admin\MemberManage;

use App\Http\Controllers\Controller;
use App\Models\Login;
use App\Models\UserInformation;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * 添加用户
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function accountAdd(Request $request){
        $login_id = $request['login_id'];
        $password = $request['password'];
        $password =  bcrypt($password);
       $data = Login:: accountAdd($login_id,$password);
       $date = UserInformation::accountAdd($login_id);
       return $data&&$date?
           json_success('成功!',null,200) :
           json_fail('失败!',null,100);
    }

    /**
     * 禁用操作
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function accountState(Request $request){
        $login_id = $request['login_id'];
        $login_status = $request['login_status'];
      $data = Login::accountState($login_id,$login_status);
        return $data?
            json_success('成功!') :
            json_fail('失败!',null,100);
    }

    /**
     * 查询
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
   public function accountQuery(Request $request ){
        $query = $request['query'];
       $data = UserInformation::accountQuery($query);
       return $data?
           json_success('成功!',$data,200) :
           json_fail('失败!',null,100);
   }

    /**
     * 数据展示
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
   public function  accountExhibition(Request $request){
       $data = Login::accountExhibition();
       return $data?
           json_success('成功!',$data,200) :
           json_fail('失败!',null,100);
   }
}
