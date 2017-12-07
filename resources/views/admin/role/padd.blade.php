 @extends('common')
 
 @section('content')
	<form class="am-form" action="{{url('pdoadd')}}" method="post">
  <fieldset>
    <legend>权限增加</legend>
	   {{csrf_field()}}
    <div class="am-form-group">
      <label for="doc-ipt-email-1">权限名称:</label>
      <input type="text" class="" name="p_name" placeholder="请输入权限名称">
    </div>
    <div class="am-form-group">
      <label for="doc-ipt-pwd-1">权限路由:</label>
      <input type="text" class="" name="p_description" placeholder="请输入权限路由">
    </div>
    

    <p><button type="submit" class="am-btn am-btn-default">提交</button></p>
  </fieldset>
</form>
 @stop