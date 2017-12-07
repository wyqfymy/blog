 @extends('common')
 
 @section('content')
  <form class="am-form" action="{{url('role/doauth')}}" method="post">
  <fieldset>
    <legend>后台用户权限修改</legend>
  {{csrf_field()}}
  <!-- {{method_field('put')}} -->
    <div class="am-form-group">
      <label for="doc-ipt-email-1">角色名称:</label>
      <input type="hidden" class="" name="role_id"  value="{{$role->role_id}}">
      <input type="text" class="" name="role_name" placeholder="请修改角色名称" value="{{$role->role_name}}">
    </div>
    <div class="am-form-group">
      <label for="doc-ipt-pwd-1">权限:</label>
      @foreach($permissions as $k=>$v)
      <!-- dd($v->p_id); -->
          @if(in_array($v->p_id,$own_permissions))
              <label for=""><input type="checkbox"  checked name="pid[]"  value="{{$v->p_id}}">{{$v->p_name}}</label>
          @else
              <label for=""><input type="checkbox"   name="p_id[]"  value="{{$v->p_id}}">{{$v->p_name}}</label>
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