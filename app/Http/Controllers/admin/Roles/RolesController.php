<?php

namespace App\Http\Controllers\admin\Roles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function index(){

//        return 1;
        return view('admin.role.role');
    }
}
