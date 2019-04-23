<?php

namespace App\Http\Controllers\admin\Login;

use App\models\logic\LoginLogic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    private $logic;

    public function __construct(LoginLogic $logic)
    {
        $this->logic=$logic;
    }

    public function index(){

        return view('admin.login.login');
    }

    /**
     * 验证码
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginCheck(Request $request){

        $validator =Validator::make($request->all(),[
            'username'=>'required|min:3',
            'password'=>'required|min:4|max:12',
            'code'=>'required|captcha'
        ],[
            'username.required'=>'宝贝,用户名要写',
            'username.min'=>'用户名至少3个字符',
            'password.required'=>'密码不填,你就提交,厉害了~',
            'password.min'=>'密码长度4~12位',
            'password.max'=>'密码长度4~12位',
            'code.required'=>'验证码哪去了?',
            'code.captcha'=>'验证码不正确'
        ]);
        if ($validator->fails()){
            session()->forget('error');
            session()->flash('error','验证失败,请重新输入');
            return false;
        }else{
            session()->forget('success');
            session()->flash('success','登录成功');
            return view('index.index');
        }

    }

    public function login(Request $request){
        //用户信息
        $u_data = $request->all();
        //验证格式
        $rs =$this->loginCheck($request);
        if ($rs) {
            //验证信息
            $bool=$this->logic->checkLogin($u_data);
            //dump($bool);die;
            if ($bool){
                $html='登录成功';
                //登录成功
                return redirect(route('admin.index'))->with(['loginsuccess'=>$html]);
            }
        }
        return redirect()->back();
        //return redirect(route('a.list')); //这里后面需要跳转到首页
    }

    public function logout(){
        if(session()->has('userinfo')){
            //清空session中userinfo
            session()->flush('userinfo');
            //设置提示信息
            session('lomsg','成功退出,回见');
            return redirect(route('admin.login')); //这里后面需要跳转到首页
        }
        return redirect(route('admin.login'))->with('lofmsg','您未进行登录,请先登录');

    }
}
