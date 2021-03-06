 @extends('common')
 
 @section('content')
	<form class="am-form" action="{{url('admin/user/update/')}}<?php echo '/'.$data['admin_id'];?>" method="post">
  <fieldset>
    <legend>后台用户修改信息</legend>
	{{csrf_field()}}
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li style="color:red">{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
    <div class="am-form-group">
      <label for="doc-ipt-email-1">账号</label>
      <input type="text" class="" name="admin_name" placeholder="请输入账号">
    </div>
    <div class="am-form-group">
      <label for="doc-ipt-pwd-1">手机号</label>
      <input type="text" class="" name="admin_telephone" placeholder="请输入手机号">
    </div>
    <div class="am-form-group">
      <label for="doc-ipt-pwd-1">邮箱</label>
      <input type="text" class="" name="admin_email" placeholder="请输入邮箱">
    </div>
    <div class="am-form-group">
      <label for="doc-ipt-pwd-1">地址</label>
      <input type="text" class="" name="admin_address" placeholder="请输入地址">
    </div>

    <p><button type="submit" class="am-btn am-btn-default">提交</button></p>
  </fieldset>
</form>
 @stop