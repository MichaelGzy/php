<?php

namespace App\models\logic;

use App\models\UserInfo;
use Illuminate\Database\Eloquent\Model;

class LoginLogic extends Model
{
    // 用户登录
    public function checkLogin(array $data) {

        $info = UserInfo::where('username', $data['username'])->first();
        // 登录用户名是合法
        if ($info) {
            if ($info['password'] == $data['password']) {
                // 写session
                session(['userinfo' => $info]);
                return true;
            }
            return false;
        }
        return false;
    }
}
