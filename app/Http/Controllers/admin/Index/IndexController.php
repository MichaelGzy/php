<?php

namespace App\Http\Controllers\admin\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){

        return view('admin.index.index');
    }

    public function getInfo(){


        return view('admin.index.welcome');

    }
}
