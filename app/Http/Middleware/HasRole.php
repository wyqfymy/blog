<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\User;
use session;
class HasRole
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
        //1.获取当前用户执行执行的操作对应的路由对应的控制器的方法

        //当前正在执行的路由对应的控制器的方法名
        $route = \Route::current()->getActionName();
        // dd($route);

        // 2.获取当前用户所有的权限
        // 获取当前的用户
        $uid = session('user')->admin_id;

        $user = User::find($uid);

        $roles = $user->role;

        // 定义一个数组存放用户拥有的所有权限
        $arr = [];
        // 根据拥有的角色获取权限
        foreach($roles as $k=>$v){
            foreach($v->permission as $m=>$n){
                $arr[] = $n->p_description;
            }
        }
        // 去除权限中重复的记录
        $arr = array_unique($arr);
        // dd($arr);

        if(in_array($route,$arr)){
            return $next($request);
        }else{
            return '权限不够';
        }

    }
}
