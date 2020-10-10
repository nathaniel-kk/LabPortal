<?php

namespace App\Http\Controllers\Admin\MemberManage;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationSetting;
use App\Models\Login;
use App\Models\UserInformation;
use Illuminate\Http\Request;

class SignController extends Controller
{
    /**
     * 数据展示
     * @return \Illuminate\Http\JsonResponse
     */
    public function  signExhibition(){
        $data = UserInformation::signExhibition();
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

    /**
     * 查询
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signQuery(Request $request){
        $query = $request['query'];
        $data = Application::signQuery($query);
            return $data?
                json_success('成功!',$data,200) :
                json_fail('失败!',null,100);
    }

    /**
     * 详情展示
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signDetails(Request $request)
    {
        $login_id = $request['login_id'];
        $data = UserInformation::signDetails($login_id);
        return $data ?
            json_success('成功!', $data, 200) :
            json_fail('失败!', null, 100);
    }

    /**
     * 增加用户
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signAdd(Request $request){
        $input = $request->all();
        foreach ($input['id'] as $v){
            $name =  Application::where('application_id',$v)->pluck('name');
            $id =  Application::where('application_id',$v)->pluck('application_id');
            $sex =  Application::where('application_id',$v)->pluck('sex');
            $self =  Application::where('application_id',$v)->pluck('self_introduce');
            $class =  Application::where('application_id',$v)->pluck('class');
            $data = Login::signAdd($id);
            $date = UserInformation::signAdd($name,$id,$sex,$self,$class);
            return $data&&$date?
                json_success('成功!', null, 200) :
                json_fail('失败!', null, 100);
        }

    }

    /**
     * 实验室总的状态
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
  public function websiteState(Request $request){
    $state = $request['state'];
      $id = $request['id'];
    $data = ApplicationSetting::websiteState($id,$state);
    return $data?
        json_success('成功!',null,200) :
        json_fail('失败!',null,100);
}
}
