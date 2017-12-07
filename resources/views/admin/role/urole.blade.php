 @extends('common')
 
 @section('content')
  <form class="am-form" action="{{url('/admin/user/dourole/'.$user->admin_id)}}" method="get">
  <fieldset>
    <legend>后台用户角色修改</legend>
  {{csrf_field()}}
  <!-- {{method_field('put')}} -->
    <div class="am-form-group">
      <label for="doc-ipt-email-1">用户名称:</label>
      <input type="hidden" class="" name="admin_id"  value="{{$user->admin_id}}">
      <input type="text" class="" name="admin_id" disabled placeholder="请修改角色名称" value="{{$user->admin_name}}">
    </div>
    <div class="am-form-group">
      <label for="doc-ipt-pwd-1">角色:</label>
      @foreach($role as $k=>$v)
      <!-- dd($v->p_id); -->
          @if(in_array($v->role_id,$a))
              <label for=""><input type="checkbox"  checked name="role_id[]"  value="{{$v->role_id}}">{{$v->role_name}}</label>
          @else
              <label for=""><input type="checkbox"    name="role_id[]"  value="{{$v->role_id}}">{{$v->role_name}}</label>
          @endif
      @endforeach
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