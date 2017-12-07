 @extends('common')
 
 @section('content')
	<form class="am-form" action="{{url('role/'.$roles->role_id)}}" method="post">
  <fieldset>
    <legend>后台用户权限修改</legend>
	{{csrf_field()}}
  {{method_field('put')}}
    <div class="am-form-group">
      <label for="doc-ipt-email-1">角色名称:</label>
      <input type="text" class="" name="role_name" placeholder="请修改角色名称" value="{{$roles->role_name}}">
    </div>
    <div class="am-form-group">
      <label for="doc-ipt-pwd-1">角色描述:</label>
      <input type="text" class="" name="role_description" placeholder="请修改角色描述" value="{{$roles->role_description}}">
    </div>
    

    <tr>
        <th></th>
        <td>
            <input type="submit" value="提交">
            <input type="button" class="back" onclick="history.go(-1)" value="返回">
        </td>
    </tr>
  </fieldset>
</form>
 @stop