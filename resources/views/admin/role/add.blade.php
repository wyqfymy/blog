 @extends('common')
 
 @section('content')
	<form class="am-form" action="{{url('role')}}" method="post">
  <fieldset>
    <legend>后台用户权限增加</legend>
	   {{csrf_field()}}
    <div class="am-form-group">
      <label for="doc-ipt-email-1">角色名称:</label>
      <input type="text" class="" name="role_name" placeholder="请输入角色名称">
    </div>
    <div class="am-form-group">
      <label for="doc-ipt-pwd-1">角色描述:</label>
      <input type="text" class="" name="role_description" placeholder="请输入角色描述">
    </div>
    

    <p><button type="submit" class="am-btn am-btn-default">提交</button></p>
  </fieldset>
</form>
 @stop