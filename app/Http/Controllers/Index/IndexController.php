<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Article;

class IndexController extends Controller
{
    public function index(Request $request){
        //获取关键字
        $kw=$request->get('keyword');

        //dump($kw);die;
        //获取文章
        $all = Article::when($kw,function ($query) use($kw){
            $query->where('title','like',"%{$kw}%");
        })->orderBy('created_at','desc');
        $num=$all->count();
        $data=$all->paginate(6);
//        $hotwords = session('hotwords');
////        dump($hotwords);die;
        return view('index.index',compact('data','num'));
    }

    public function indexHot(){
        //获取文章
        $all = Article::orderBy('read_num','desc');
//        dump($all);die;
        $data=$all->offset(0)->take(10)->select()->paginate(10);        //这里用的是蹩脚法
        $num=$data->count();
//        dump($data);die;
        return view('index.hot',compact('data','num'));
    }

    
}
