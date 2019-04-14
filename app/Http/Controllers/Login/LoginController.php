<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Login\Login;

class LoginController extends Controller
{
    public function login(){
        return view('login/login');
    }
    public function doLogin(Request $request){
        //获取提交的数据
        $username=$request->get('u');
        $password=$request->get('p');

        $rs = Login::getUser();
        if ($rs['username']==$username && $rs['password']==$password){
            echo "登录成功";
            return view('article/article',['data'=>$rs]);
        }else{
            echo "登录需要的信息:";
            echo '登录失败';
            dump($rs);
            return view('/login/login');
        }
    }
}
