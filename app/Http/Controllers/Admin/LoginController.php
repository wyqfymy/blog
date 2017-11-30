<?php

namespace App\Http\Controllers\Admin;
//控制器用的所有的类都需要引入
//表单验证的门面类 如不在config/app.对这个类重命名成这样类似DB的话 需要引入
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash; //引哈希加密
use App\Model\User;
//引入模板User Upser.php(里面主要写了表名 主键名 可修改字段 是否有时间段)
//use App\Http\Request;
//
use App\Http\Controllers\Controller;
// config_path()  public_path() base_path(根目录) database_path()
//引入Code类的路径 app_path() (不能直接写app 不然找不到)
require_once app_path().'\Org\code\code.php';
use App\Org\code\Code;  //命名空间 App\Org\code\类名  类似于 use DB
//captcha验证码引入
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 后台登录页面
     * return view
     */
    public function login()
    {
    	return view('admin.login.login');
    }
    public function yzm()
    {
        //对自定义的类实例化
        $code = new Code();
        //调用构造验证码的方法
        $code -> make();
    }
    public function captcha()
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        \Session::flash('code', $phrase);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        //直接输出图片到网页
        $builder->output();
    }
    public function dologin(Request $request)
    {
        //1.获取用户提交的登录数据
        //2.对数据进行后台表单验证
        //Validator::make(要验证的数据，验证规则，提示信息)
        //参数一 要验证的数据
        $input = $request->except('_token');
//        print_r($input);
        //参数二 验证规则
        $rule = [
            'admin_name' => 'required|between:4,50',
            'admin_password' => 'required|between:4,20',
        ];
        //参数三 提示信息
        $massage = [
            'admin_name.require' => '用户名必须输入',
            'admin_name.between'=>'用户名必须在4到20位之间',
            'admin_password.require'=>'密码必须输入',
            'admin_password.between'=>'密码必须在4到20位之间',
        ];
       $validator = Validator::make($input, $rule, $massage);
       //如果表单验证失败fails()  成功(passes() )
       if($validator->fails()){
           //失败的话 重定向调到登录页 并携带错误信息及 表单信息
            return redirect('/admin/login')
                    ->withErrors($validator)
                    ->withInput();
       }
       //规则验证成功 判断数据库中是否有该用户
       //1. 判断验证码是否正确
       if($input['code'] != Session::get('code')){
           return redirect('admin/login')->with('errors','验证码错误,请重新输入');
       }
       //2.判断用户名和密码是否存在(前面引入模型User 下面直接使用)
        $user = User::where('admin_name',$input['admin_name'])->first();
        if(!$user){
            return redirect('admin/login')->with('errors','用户名不存在,请重新输入');
        }
        if($user['admin_password'] != $input['admin_password']){
            return redirect('admin/login')->with('errors','密码错误,请重新输入');
        }else{
            return redirect('admin/index');
        }

//        //获取密码加密与数据库进行比较
//        $admin_password = Hash::make($user['admin_password']);
//        if(Hash::check($admin_password, $input['admin_password'])){
//            return redirect('admin/login')->with('errors','密码错误,请重新输入');
//        }else{
//            return redirect('admin/index');
//        }

    }



}
