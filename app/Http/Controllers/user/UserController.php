<?php

namespace App\Http\Controllers\user;

use http\Env;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\UserInfo;
//验证类
use Validator;

class UserController extends Controller
{
    public function getDetail(){
        return '用户信息,待实现';
    }

}
