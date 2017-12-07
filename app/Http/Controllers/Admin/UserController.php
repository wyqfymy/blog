<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Model\Role;
use DB;
class UserController extends Controller
{

    /**
     * 返回用户授角色的页面
     *
     */
    public function urole($id)
    {
      // 获取当前的用户
      $user = User::find($id);

      // 获取所有的角色
      $role = Role::get();

      // 获取当前的用户被赋予的角色
      // DB中查询用户的角色表,当用户的id等于传来的id,列出所有的角色id
       $b = DB::table('role_user')->where('uid',$id)->first();
        if (empty($b)){
            $a = [];
        }else{


            $own_role = DB::table('role_user')->where('uid',$id)->get(  );
            


            foreach ($own_role as $key => $value) {
                 $a[] = $value->role_id;
            }
        }
    // dd($a);
    // dd($own_permissions);

        return view('admin.role.urole',compact('user','role','a'));
    }


    public function dourole(Request $request,$id)
    {
      // 接受用户提交的数据
      $input = $request->except('_token');
      // dd($input);
      // dd($id);
      DB::beginTransaction();
      try{
        // 删除用户以前拥有的权限
        DB::table('role_user')->where('uid',$id)->delete();
        // 给当前的用户从新授权
        // 将授权的数据添加到role_p表中
        if(isset($input['role_id'])){
                foreach ($input['role_id'] as $k=>$v){
                    DB::table('role_user')->insert(['uid' => $id, 'role_id' =>$v]);
                }
            }
      }catch (Exception $e){
            DB::rollBack();
        }
        DB::commit();
        return redirect('/admin/user/index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //查数据
        // dd($request);
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
            ->paginate(2);
        return view('admin.user.index',['data'=>$data, 'request'=> $request]);
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
        
        $date = [];
        if($res){
            $date['error'] = 0;
            $date['msg'] ="删除成功";
        }else{
            $date['error'] = 1;
            $date['msg'] ="删除失败";
        }

//        return  json_encode($data);

        return $date;

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
        $data = [];
        if($res){
            $data['error'] = 0;
            $data['msg'] ="删除成功";
        }else{
            $data['error'] = 1;
            $data['msg'] ="删除失败";
        }

//        return  json_encode($data);

        return $data;
    }
}
