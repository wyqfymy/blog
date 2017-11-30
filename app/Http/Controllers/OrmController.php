<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class OrmController extends Controller
{
    /**
     * 获取用户表中的所有数据,显示到前台的表中
     *
     */
    public function index()
    {
    	// $blog = DB::table('admin_login')->get();
    	// dd($blog);
    	// $blog = User::get();
    	// dd($blog);

    }
    public function create()
    {
        return view('admin.user.create');
    }


    public function store(Request $request)
    {
        // 获取用户提交的登录数据
        // dd('处理信息页面');
        $input = $request->except('_token');
        // dd($input);
        // 对数据进行后台验证
        // 建立表单验证的正则规则
        $rule = [
            'admin_name'=>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u|between:5,20',
            "admin_password"=>'required|between:3,20',
            'admin_repassword'=>'required|same:admin_password',
            'admin_telephone'=>'required|regex:/^1[358]{1}[123569]{1}\d{8}/',
            'admin_email'=>'required|regex:/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/',
            'admin_address'=>'required'
        ];
        $mess = [
            'admin_name.required'=>'用户名必须输入',
            'admin_name.regex'=>'用户名必须汉字字母下划线',
            'admin_name.between'=>'用户名必须在5到20位之间',
            'admin_password.required'=>'密码必须输入',
            'admin_password.between'=>'密码必须在5到20位之间',
            'admin_telephone.required'=>'电话号码你要填哦',
            'admin_telephone.regex'=>'请输入正确格式的电话号码',
            'admin_email.required'=>'请输入邮箱',
            'admin_repassword.same'=>'两次输入密码不一致',
            'admin_repassword.required'=>'再次输入密码不能为空',
            'admin_email.regex'=>'请输入正确的邮箱格式',
            'admin_address.required'=>'不输入地址我怎么查水表'
        ];

        $validator =  Validator::make($input,$rule,$mess);
        // 如果验证失败
        if ($validator->fails()) {
              return redirect('admin/user/create')
                  ->withErrors($validator)
                  ->withInput();
        }

        $res = User::create('input');
        dd($res);
    }

}
