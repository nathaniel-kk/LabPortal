<?php

namespace App\Http\Controllers\Admin\PageContent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageContent\labEdit;
use App\Models\Labor;
use App\Models\Link;
use App\Models\WebInformation;
use Illuminate\Http\Request;



/**
 * caiwenpin
 */
class LabController extends Controller
{
    public function labShow(){
//        $lab = Labor::select(['produce','enviroment','architect','direction','pro_url'])->first();
//        $web = WebInformation::select(['name','title','footer'])->first();
//        $date['pro_url']=$lab['pro_url'];
//        $date['produce']= $lab['produce'];
//        $date['enviroment']= $lab['enviroment'];
//        $date['architect']= $lab['architect'];
//        $date['direction']= $lab['direction'];
//        $date['name']= $web['name'];
//        $date['title']= $web['title'];
//        $date['footer']= $web['footer'];
//        return $date?
//            json_success('成功!',$date,200) :
//            json_fail('失败!',null,100);

        $data = Labor::LabShow();
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

    public function labEdit(labEdit $request){
        //上传
        //判断文件是否正常

//            $data = $request->all();
//            if (($request->hasFile('pro_url') && $request->file('pro_url')->isValid())) {
//                $path_1 = md5(time() . rand(1000, 9999)) .
//                    '.' . $request->file('pro_url')->getClientOriginalExtension();
//                $request->file('pro_url')->move('./public', $path_1);
//                $data['pro_url'] = './public' . $path_1;
//            }
//
//            if (($request->hasFile('env_url') && $request->file('env_url')->isValid())) {
//                $path_2 = md5(time() . rand(1000, 9999)) .
//                    '.' . $request->file('env_url')->getClientOriginalExtension();
//                $request->file('env_url')->move('./public', $path_2);
//                $data['env_url'] = './public' . $path_2;
//            }
//
//            if (($request->hasFile('arc_url') && $request->file('arc_url')->isValid())) {
//                $path_3 = md5(time() . rand(1000, 9999)) .
//                    '.' . $request->file('arc_url')->getClientOriginalExtension();
//                $request->file('arc_url')->move('./public', $path_3);
//                $data['arc_url'] = './public' . $path_3;
//            }
//
//            if (($request->hasFile('dir_url') && $request->file('dir_url')->isValid())) {
//                $path_4 = md5(time() . rand(1000, 9999)) .
//                    '.' . $request->file('dir_url')->getClientOriginalExtension();
//                $request->file('dir_url')->move('./public', $path_4);
//                $data['dir_url'] = './public' . $path_4;
//            }
//
//
//            Labor::where('labor_id',$data['labor_id'])->update([
//                'produce'=>$data['produce'],
//                'pro_url'=> $data['pro_url'],
//                'enviroment'=>$data['enviroment'],
//                'env_url'=>$data['env_url'],
//                'architect'=>$data['architect'],
//                'arc_url'=>$data['arc_url'],
//                'direction'=>$data['direction'],
//                'dir_url'=>$data['dir_url']
//            ]);
//            WebInformation::where('id',$data['id'])->update([
//                'name'=>$data['name'],
//                'title'=>$data['title'],
//                'footer'=>$data['footer']
//            ]);
//            return $data?
//              json_success('成功!',$data,200) :
//              json_fail('失败!',null,100);
        $data = Labor::LabEdit($request);
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);

    }




}
