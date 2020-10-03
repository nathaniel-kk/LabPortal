<?php

namespace App\Http\Controllers\LabHome;

use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function login(){
        $res = Login::createUser(arry());
        return $res!=null ?
            json_fail():
            json_success();
        echo "asd";
    }
}
