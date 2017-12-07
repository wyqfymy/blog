 @extends('common')
 
 @section('content')
	<form class="am-form" action="{{url('pupdate/'.$permissions->p_id)}}" method="get">
  <fieldset>
    <legend>权限修改</legend>
	   {{csrf_field()}}
    <div class="am-form-group">
      <label for="doc-ipt-email-1">权限名称:</label>
      <input type="text" value="{{$permissions->p_name}} "class="" name="p_name" placeholder="请输入权限名称">
    </div>
    <div class="am-form-group">
      <label for="doc-ipt-pwd-1">权限路由:</label>
      <input type="text" class="" value="{{$permissions->p_description}} " name="p_description" placeholder="请输入权限路由">
    </div>
    

    <p><button type="submit" class="am-btn am-btn-default">提交</button></p>
  </fieldset>
</form>
 @stop