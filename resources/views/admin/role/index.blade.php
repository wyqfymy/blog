 @extends('common')
 
 @section('content')
	<form action="{{url('role')}}" method="post">
        {{csrf_field()}}

        <div class="am-u-sm-9">
          <table class="am-table am-table-striped am-table-hover table-main" >
            <thead>
            <tr>
              <th>ID</th><th>角色名称</th><th>角色描述</th><th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $k=>$v)
            <tr>
            <td>{{$v->role_id}}</td>
            <td>{{$v->role_name}}</td>
            <!-- <td>{{$v->p_name}}</td> -->
            <td>{{$v->role_description}}</td>
              <td>
                <a href="{{url('role/auth/'.$v->role_id)}}">授权</a>
                <a href="{{url('role/'.$v->role_id.'/edit')}}">修改</a>
                <a href="javascript:;" onclick="userDel({{$v->role_id}})" >删除</a>
            </td>
            </tr>
      @endforeach

            </tbody>
          </table>
        </div>
  </form>
  <script type="text/javascript">

  function userDel(role_id){
    // 询问框
    layer.confirm('您确认删除吗?',{
        btn:['确认','取消']
    },function(){
      $.post("{{url('role')}}/"+role_id,
        {"_method":"delete","_token":"{{csrf_token()}}"},
        function(data){
          if(data == 1){
            layer.msg('删除成功', {icon: 6});
          var t=setTimeout("location.href = location.href;",1000);
          }else{
            layer.msg('删除失败', {icon: 5});
              var t=setTimeout("location.href = location.href;",1000);
          }
        });
    },function(){

    });
  }

  </script>
 @stop