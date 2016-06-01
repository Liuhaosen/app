<?php

namespace App\Http\Middleware;

use Closure;

class FloginMiddleware
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
      
        $refer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']:'';
        
            if(session('id')){
            return $next($request);
        }else{
            $url = url('login').'?redirect='.$refer;
            return redirect($url)->with('error','您还没有登录');
        }
    }
}
