<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        // 验证登录
        if($request->session()->exists()){
            // 执行下次请求通过
            return $next($request);
        }else{
            //跳转到登录页面
            return redirect()->route('admin/login');
        }
        
    }
}
