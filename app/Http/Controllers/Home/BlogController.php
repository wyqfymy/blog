<?php

namespace App\Http\Controllers\Home;
//控制器用的所有的类都需要引入
//表单验证的门面类 如不在config/app.对这个类重命名成这样类似DB的话 需要引入
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash; //引哈希加密
use App\Model\Home_user;
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

class BlogController extends Controller
{
    //
    public function index()
    {
    	return view('home.index.index');
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
            session()->push('code', 'developers');
	        // 生成图片
	        header("Cache-Control: no-cache, must-revalidate");
	        header("Content-Type:image/jpeg");
	        //直接输出图片到网页
	        $builder->output();
	    }

    public function register()
    {
        return view('home/index/register');
    }



    public function doregister(Request $request)
    {
    	$input = $request->except('_token');
        // dd($input);
    	$rule = [
            'uname'=>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u|between:5,20',
            "upassword"=>'required|between:3,20',
            'urepassword'=>'required|same:upassword',
            'uphone'=>'required|regex:/^1[358]{1}[123569]{1}\d{8}/',
            'uemail'=>'required|regex:/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/',
        ];
        $mess = [
            
        ];
        $validator =  Validator::make($input,$rule,$mess);
        if ($validator->fails()) {
              return '验证失败';
        }
        // dd(Session::get('code'));
        if($input['code'] !== Session::get('code')){
           return redirect('home/zc')->with('errors','验证码错误,请重新输入');
       	}
        $data = $request->except('_token','urepassword','code');
        $user = Home_user::where('uname',$input['uname'])->first();
        if($input['uname'] == $user['uname']){
            return redirect('home/zc');
        }
        $aa = Home_user::where('uphone',$input['uphone'])->first();
        if($input['uphone'] == $user['uphone']){
            return redirect('home/zc');
        }
        $bb =  Home_user::where('uemail',$input['uemail'])->first();
        if($input['uemail'] == $user['uemail']){
            return redirect('home/zc');
        }
        $res = Home_user::create($data);
        if($res)
        {
            return '用户注册成功';
        }else{
            return '失败';
        }
    }

    public function ajaxuname(Request $request)
    {
    	$input = $request->except('_token');
    	// $b = $input['uname'];
    	$user = Home_user::where('uname',$input['uname'])->first();
    	$rule = [
            'uname'=>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u|between:5,20',
        ];
        if($input['uname'] == ''){
            return back();
        }else{
           if($user){
                return 1;
            }else{
                return 0;
            } 
        }
    	
    }

    public function ajaxuphone(Request $request){
    	$input = $request->except('_token');
    	// $b = $input['uname'];
    	$user = Home_user::where('uphone',$input['uphone'])->first();
    	if($user){
    		return 1;
    	}else{
    		return 0;
    	}
    }

    public function ajaxuemail(Request $request){
    	$input = $request->except('_token');
    	// $b = $input['uname'];
    	$user = Home_user::where('uemail',$input['uemail'])->first();
    	if($user){
    		return 1;
    	}else{
    		return 0;
    	}
    }
    public function ajaxupassword(Request $request){
    	$input = $request->except('_token');
    	// $b = $input['uname'];
    	$user = Home_user::where('upassword',$input['upassword'])->first();
    	if($user){
    		return 1;
    	}else{
    		return 0;
    	}
    }
    public function ajaxurepassword(Request $request){
    	$input = $request->except('_token');
    	$user = Home_user::where('upassword',$input['upassword'])->first();
    	if($user){
    		return 1;
    	}else{
    		return 0;
    	}
    }
}
