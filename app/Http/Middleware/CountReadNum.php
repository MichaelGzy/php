<?php

namespace App\Http\Middleware;

use Closure;

class CountReadNum
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        echo '详情信息中间件--';
        session(['crn'=>['id'=>$request->id]]);
        //dump($request->id);
        //die;

        return $next($request);
    }
}
