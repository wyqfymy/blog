<?php

namespace App\Http\Middleware;

use Closure;
//门面类
use Session;

class IsLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //中间登录
    public function handle($request, Closure $next)
    {
        //若用户登录 向下执行
        // $value = $request->session()->get('user');
        // dd($value);
        // dd(Session::get('suser'));
        if(Session::get('user')){
            return $next($request);
        }else{
            return redirect('admin/login')->with('error','您还没登录,请先登录...');
        }
        
    }
}
