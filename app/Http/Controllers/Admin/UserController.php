<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //查数据
        $data = User::orderBy('admin_id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('key');
                //$email = $request->input('keywords2');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('admin_name','like','%'.$username.'%');
                }

            })
            ->paginate(3);
        return view('admin.user.index',['data'=>$data, 'request'=> $request]);
        // dd($data);
        


    }

    /**
     * 添加用户
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/user/create');
    }

    /**
     * 处理添加过来的数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取用户提交的登录数据
        // dd('处理信息页面');
        $input = $request->except('_token');
//         dd($input);
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
        $data = $request->except('_token','admin_repassword');
        // dd($data);
        $res = User::create($data);
        // dd($res);
        if($res)
        {
            return redirect('/admin/user/index');
        }else{
            return 111;
        }
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if($user){
            // 获取修改的用户
            return view('admin.user.edit',['data'=>$user]);
        }else{
            return '当前用户不存在';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //处理修改的数据

        $input = $request->except('_token');
        $user = User::find($id);
        $rule = [
            'admin_name'=>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u|between:5,20',
            
            'admin_telephone'=>'required|regex:/^1[358]{1}[123569]{1}\d{8}/',
            'admin_email'=>'required|regex:/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/',
            'admin_address'=>'required'
        ];
        $mess = [
            'admin_name.required'=>'用户名必须输入',
            'admin_name.regex'=>'用户名必须汉字字母下划线',
            'admin_name.between'=>'用户名必须在5到20位之间',
            
            'admin_telephone.required'=>'电话号码你要填哦',
            'admin_telephone.regex'=>'请输入正确格式的电话号码',
            'admin_email.required'=>'请输入邮箱',
            
            
            'admin_email.regex'=>'请输入正确的邮箱格式',
            'admin_address.required'=>'不输入地址我怎么查水表'
        ];

        $validator =  Validator::make($input,$rule,$mess);
        // 如果验证失败
        if ($validator->fails()) {
              return back()
                  ->withErrors($validator)
                  ->withInput();
        }
        $data = $request->except('_token','admin_repassword');

        $res = $user->update($data);
        // dd($input);
        if($res){
            return redirect('/admin/user/index');
        }else{
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res = User::find($id)->delete();

        if($res){
            return redirect('/admin/user/index');
        }else{
            return back();
        }
    }
}