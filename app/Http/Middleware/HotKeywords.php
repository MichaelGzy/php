<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redis;
use Closure;

class HotKeywords
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
        //echo '热门关键词:';
        //获取关键字
        $kw=$request->get('keyword');

        //操作redis
        if (!empty($kw)){
            //无序集合,存储搜索过的关键词
            //$store = Redis::sadd('HOTWORDS',$kw);
            //有序集合,进行关键词数量+1
            $k='HOT';
            Redis::zadd($k,'INCR',1,$kw);
            //echo $keywords;
            //获取所有成员
            $hot = Redis::zrevrange($k,0,4,'WITHSCORES'); //$hot 是一个数组
            //dump($hot);

            //遍历数组,获取组合,键  值
            $hotwords=[];
            foreach ($hot as $key=>$val){
                $hotwords[]=$key;
            }
            //dump($hotwords);
            session(['hotwords'=>$hotwords]);
        }

        return $next($request);
    }
}
