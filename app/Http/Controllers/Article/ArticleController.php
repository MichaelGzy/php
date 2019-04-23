<?php

namespace App\Http\Controllers\article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Article;

class ArticleController extends Controller
{
    public $page_size=0;

    public function __construct()
    {
        $this->page_size=env('PAGESIZE')?:6;
    }

    public function addArticle(){
        return view('article.add');
    }


    /**
     * 文章列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        //获取关键字
        $kw=$request->get('keyword');
        //dump($kw);die;
        //查询所有
        $all = Article::when($kw,function ($query) use($kw){
            $query->where('title','like',"%{$kw}%");
        })->where('user_id',session()->get('userinfo')->id)->orderby('id','dsc');
        //统计总数
        $num=$all->count();
        //分页处理
        $data=$all->paginate($this->page_size);
//        dump($data);die;
        //返回数据
        return view('article.list',compact('data','num'));
    }

    /**
     * 热门文章
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articleHot(){
        //获取文章
        $all = Article::where('user_id',session()->get('userinfo')->id)->orderBy('read_num','desc');
        //dump($all);die;
        $data=$all->offset(0)->take(10)->select()->paginate(10);        //这里用的是蹩脚法
        $num=$data->count();
        //返回数据
        //dump($data);die;
        return view('article.list',compact('data','num'));
    }

    /**
     * 文章详情
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function detail(Request $request ,int $id){
//        dump(session('crn'));
        //查询一条数据
        $data = Article::where('id',$id)->first();
        //设置阅读数+1
        $read_num=($data->read_num)+1;
        //写入数据库
        Article::where('id',$request->id)->update(['read_num'=>$read_num]);
        //返回信息
        return view('article.detail',compact('data'));
    }

    /**
     * 删除文章
     * @param int $id
     * @return array
     */
    public function delArticle(int $id){
        //id存在
        if ($id){
            //执行删除
            $rs = Article::where('id',$id)->delete();
            if ($rs){
                //返回数据
                $res=['status'=>200,'msg'=>'删除成功','data'=>$rs];
                return $res;
            }
            //返回数据
            $res=['status'=>4000,'msg'=>'删除失败','data'=>$rs];
            return $res;
        }
        return ['status'=>4001,'msg'=>'删除异常'];

    }


}
