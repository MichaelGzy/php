<?php

namespace App\Login;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public static function getUser(){
        $data = [
            'id'=>1,
            'username'=>'banzhuan',
            'password'=>'123456'
        ];
        return $data;
    }
}
