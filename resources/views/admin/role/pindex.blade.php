 @extends('common')
 <meta name="csrf-token" content="{{ csrf_token() }}">
 @section('content')
	<form action="{{url('role')}}" method="post">
        {{csrf_field()}}

        <div class="am-u-sm-9">
          <table class="am-table am-table-striped am-table-hover table-main" >
            <thead>
            <tr>
              <th>ID</th><th>权限名称</th><th>权限路由</th><th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $k=>$v)
            <tr>
            <td>{{$v->p_id}}</td>
            <td>{{$v->p_name}}</td>
            <!-- <td>{{$v->p_name}}</td> -->
            <td>{{$v->p_description}}</td>
              <td>
                <a href="{{url('/pedit/'.$v->p_id)}}">修改</a>
                <a href="javascript:;" onclick="userDel({{$v->p_id}})" >删除</a>
            </td>
            </tr>
      @endforeach

            </tbody>
          </table>
        </div>
  </form>
  <script type="text/javascript" src="{{asset('http://apps.bdimg.com/libs/jquery/2.1.4/jquery.js')}}"></script>
  <script type="text/javascript">

  function userDel(p_id){
    // 询问框
    layer.confirm('您确认删除吗?',{
        btn:['确认','取消']
    },function(){
      $.post("{{url('pdel')}}/"+p_id,
        {"_token":"{{csrf_token()}}"},
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