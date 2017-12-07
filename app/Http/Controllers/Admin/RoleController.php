<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Permission;
use App\Model\Role;
use App\Model\User;
// use App\Model\Permission;
use DB;
use App\Http\Requests;
class RoleController extends Controller
{
    
   /**
    * 返回权限的页面
    *
    */
    public function pindex()
    {
        $permissions =  Permission::get();
        // dd($permissions);
        // return 111;
        return view('admin/role/pindex',compact('permissions'));
    }
    // 权限的添加
    public function padd()
    {
        return view('admin.role.padd');
    }
    // 权限执行添加
    public function pdoadd(Request $request)
    {
        // return 1111;
        $input = $request->except('_token');
            // 执行添加操作
        $res = Permission::create($input);

        if($res){
            return redirect('pindex');
        }else{
            return back();
        }

    }
    // 权限的修改
    public function pedit($id)
    {
        $permissions = Permission::find($id);
        if($permissions){
            return view('admin.role.pedit',compact('permissions'));
        }else{
            return '该用户不存在';
        }
    }
    // 执行权限修改
    public function pupdate(Request $request,$id)
    {
        // dd($id);
        //处理修改的数据
        $input = $request->except('_token');
        // dd($input);
        $permissions = Permission::find($id);

        $res = $permissions->update($input);
        if($res){
            return redirect('pindex');
        }else{
            return back();
        }
    }

    public function pdel($id)
    {   
        $res = Permission::find($id)->delete();
        // dd($res);
        // return 123;
        if($res){
            return 1;
        }else{
            return 0;
        }

        // json_encode();
    }



    /**
     * 返回角色授权的页面
     *
     */
    public function auth($id)
    {
        // return Route::current()->getActionName();

        // 获取当前的角色
        $role = Role::find($id);
        // dd($role);

        // 获取所有的权限
        $permissions = Permission::get();
        // dd($permissions);

        // 获取当前用户已经拥有的权限
        // DB中查询角色权限表 条件是角色id等于传过来的id,列出所有的权限
        $own_permissions = DB::table('role_p')->where('role_id',$id)->pluck('p_id');
    	// dd(is_object($own_permissions));
    	function objectToArray($own_permissions){
		    $own_permissions=(array)$own_permissions;
		    foreach($own_permissions as $k=>$v){
		        if( gettype($v)=='resource' ) return;
		        if( gettype($v)=='object' || gettype($v)=='array' )
		            $own_permissions[$k]=(array)objectToArray($v);
		    }
		    return $own_permissions;
		}
		$own_permissions = objectToArray($own_permissions);
		// dd($own_permissions);
        return view('admin.role.auth',compact('role','permissions','own_permissions'));
    }
    /**
     * 处理用户授权操作
     */

    public function doauth(Request $request)
    {
    	// 接受用户提交的数据
    	$input = $request->except('_token');
    	// dd($input);
    	DB::beginTransaction();
    	try{
    		// 删除用户以前拥有的权限
    		DB::table('role_p')->where('role_id',$input['role_id'])->delete();
    		// 给当前的用户从新授权
    		// 将授权的数据添加到role_p表中
    		if(isset($input['p_id'])){
                foreach ($input['p_id'] as $k=>$v){
                    DB::table('role_p')->insert(['role_id'=>$input['role_id'],'p_id'=>$v]);
                }
            }
    	}catch (Exception $e){
            DB::rollBack();
        }
        DB::commit();
        return redirect('role');
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取所有的角色
        $roles = Role::get();

        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取提交的数据
        $input = $request->except('_token');
        // dd($input);

        // 执行添加操作
        $res = Role::create($input);

        if($res){
            return redirect('role');
        }else{
            return back();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::find($id);
        if($roles){
            return view('admin.role.edit',compact('roles'));
        }else{
            return '该用户不存在';
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
        $input = $request->except('_token','_method');
        // dd($input);
        $roles = Role::find($id);

        $res = $roles->update($input);
        if($res){
            return redirect('role');
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
        $res = Role::find($id)->delete();
        // dd($res);
        // return 123;
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    // public function delete($id)
    // {
    //     $res = Role::find($id)->delete();
    //     // dd($res);
    //     // return 123;
    //     if($res){
    //         return redirect('role');
    //     }else{
    //         return back();
    //     }
    // }
}
