<?php

namespace App\Http\Controllers\Admin\PageContent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


/**
 * 这里面没用，但我不想删
 * caiwenpin
 */
class CommonController extends Controller
{
    //文件上传的方法
    public function upLode(Request $request){
        //获取用户上传内容
       $file = $request->file('Filedata');

       $dir = $request->input('files');
       //判断目录是否存在
        if(file_exists("./uploads/{$dir}")){

        }else{
            mkdir("./uploads/{$dir}");
        }
        //判断上传文件是否有效
        if($file->isValid()){
            //获取后缀
            $ext = $file->getClientOriginalExtension();
            //生成新的文件名
            $newFile = time().rand().'.'.$ext;

            //移动到指定目录
            $file->move('./uploads/'.$dir,$newFile);
        }
    }


}
