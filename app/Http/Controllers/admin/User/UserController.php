<?php

namespace App\Http\Controllers\admin\User;

use App\models\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public $page_size=0;
//    protected $page_size =6;



    public function __construct()
    {
        $this->page_size=env('PAGESIZE');
    }

    /**
     * 用户列表
     */
    public function index(Request $request){
        $kw=$request->get('keyword');
//        dump($kw);die;
        $all = UserInfo::when($kw,function ($query) use($kw){
            $query->where('username','like',"%{$kw}%");
        })->orderby('id','dsc');
        $num=$all->count();
        $data=$all->paginate($this->page_size);
        return view('user.list',compact('data','num'));
    }

    public function getDetail(){
        return '后台用户信息,待实现';
    }

    /**
     * 用户添加页
     */
    public function addUser(){
        return view('user.add');
    }

    /**
     * 添加用户处理
     */
    public function addUserSave(Request $request){
//        echo '添加用户处理';
        $validator=Validator::make($request->all(),[
            'username'=>'required|min:2',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'age'=>'required|min:1',
            'sex'=>'required|in:0,1',
            'email'=>'required|email'
        ],[
            'username.required'=>'用户名填一下',
            'password.required'=>'密码很重要',
            'age.min'=>'年龄最小为1',
            'sex.in'=>'性别分男或女',
        ]);
        $u_data =$request->except('_token','password_confirmation');
//        dump($u_data);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $rs = UserInfo::create($u_data);
        $data=['status'=>200,'msg'=>'添加成功','data'=>$rs];
        return redirect(route('u.list'));
    }

    /**
     * 修改用户页
     */
    public function updateUser(int $id){
        $data =UserInfo::find($id);
        return view('user.edit',compact('data'));
    }

    /**
     * 修改用户处理
     */
    public function updateUserSave(Request $request, int $id){
        echo '修改处理';
        $validator=Validator::make($request->all(),[
            'username'=>'required|min:2|unique:user_info,username,'.$id,  //注意此处唯一验证
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'age'=>'required|min:1',
            'sex'=>'required|in:0,1',
            'email'=>'required|email|unique:user_info,email,'.$id   //此处邮箱验证唯一
        ],[
            'username.required'=>'用户名填一下',
            'password.required'=>'密码很重要',
            'age.min'=>'年龄最小为1',
            'sex.in'=>'性别分男或女',
        ]);
        $u_data =$request->except('_token','_method','password_confirmation');
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
//        dump($u_data);die;
        $rs = UserInfo::where('id',$id)->update($u_data);
        if($rs){
            return redirect(route('u.list'));
        }
    }

    /**
     * 删除用户处理
     */
    public function delUser(int $id){
        if ($id){
            $rs = UserInfo::where('id',$id)->delete();
        }
        $data=['status'=>200,'msg'=>'删除成功','data'=>$rs];
        return $data;
    }

    public function delList(){
//        dump($this->page_size);die；
        //查询软删除
        $data = UserInfo::onlyTrashed();
        //统计
        $num = $data->count();
        //分页
        $data=$data->paginate($this->page_size);
        session(['record'=>$num]);

        return view('user.recycle',compact('data','num'));
//        ->with(session('record'))
    }
}
