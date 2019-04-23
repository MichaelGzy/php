<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * 登录检测中间件
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $bool =session()->has('userinfo.username');
        if (!$bool){
            return redirect(route('l.login'))->with('cklmsg','请登录后访问,谢谢');
        }
//        dump($request);
        return $next($request);
    }
}
