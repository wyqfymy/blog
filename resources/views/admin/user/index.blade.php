 @extends('common')
 
 @section('content')
<style type="text/css">
	#www
	{
		position:absolute;
		left:932px;
		top:65px;
		width:373px;
		height:23px;
		z-index:2;
	}
  #qqq{
    /*position:absolute;*/
    height:565px;
  }
</style>
<div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">后台用户</strong> / <small>几个后台的用户</small></div>
        @if (session('msg'))
                <b class="msgb" style="color:red; font-size:15px">{{session('msg')}}</b>
                    <script>
                        setTimeout(function(){
                            $('.msgb').empty().remove();

                        },2000);
                   </script>
                            
        @endif
      </div>

      <div class="am-g" id="qqq">
      <div class="am-g">
        
        <form action="{{url('admin/user/index')}}" method="get">
        {{csrf_field()}}
        <div class="am-u-sm-12 am-u-md-3" id="www">
          <div class="am-input-group am-input-group-sm">
            <input type="text" name="key"  class="am-form-field" placeholder="名字关键字">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="submit">搜索</button>
          </span>
          </div>
        </div>
        </form>
      </div>
        <div class="am-u-sm-12">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
            <tr>
              <th>ID</th><th>用户名</th><th>邮箱</th><th>电话</th><th>地址</th><th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
            <tr>
            <td>{{$v->admin_id}}</td>
            <td>{{$v->admin_name}}</td>
            <td>{{$v->admin_email}}</td>
            <td>{{$v->admin_telephone}}</td>
            <td>{{$v->admin_address}}</td>
              <td>
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span><a href="javascript:;" onclick="aa({{$v->admin_id}})">编辑</a></button>
                      <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> <a href="javascript:;" onclick="user({{$v->admin_id}})">删除</a></button>

                      <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span><a href="{{asset('role/urole/'.$v->admin_id)}}">授权</a></button>

                    </div>
                  </div>
              </td>
            </tr>
			@endforeach

            </tbody>
          </table>
        </div>
        <script type="text/javascript" src="{{asset('http://apps.bdimg.com/libs/jquery/2.1.4/jquery.js')}}"></script>
      		<div class="am-fr">
      			<ul id="sunjia" class="am-pagination">
      			<li class="am-disabled">
                {!! $data->appends($request->all())->render() !!}
                </li>
                </ul>
            </div>

  </div>
              <script type="text/javascript">
              
                function user(id) {
                    layer.alert('内容');
            //询问框
                  layer.confirm('您确认删除吗？', {
                      btn: ['确认','取消'] //按钮
                  }, function(){
//                如果用户发出删除请求，应该使用ajax向服务器发送删除请求
//                $.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
                //admin/user/1
                $.ajax({
                  type:"post",

                  url:"{{url('admin/user/del')}}/"+id,
                  data:{"_token":"{{csrf_token()}}"},

                  success: function(data){
                    if(data.error == 0){
                       //console.log("错误号"+res.error);
                       //console.log("错误信息"+res.msg);
                       layer.msg(data.msg, {icon: 6});
//                       location.href = location.href;
                       var t=setTimeout("location.href = location.href;",2000);
                   }else{
                       layer.msg(data.msg, {icon: 5});

                       var t=setTimeout("location.href = location.href;",2000);
                       //location.href = location.href;
                   }

                  }, 

                  dataType:"json",
                });
            });
        }

        function aa(id) {
                    layer.alert('内容');
            //询问框
                  layer.confirm('您确认更改吗？', {
                      btn: ['确认','取消'] //按钮
                  }, function(){
// //                如果用户发出删除请求，应该使用ajax向服务器发送删除请求
// //                $.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
//                 //admin/user/1
                    // redirect('{{asset('/admin/user/edit')}}/'+id);
                    $(location).attr('href', '{{asset('/admin/user/edit')}}/'+id);
//                
                    });
//            
                  }
                
        </script>
 @stop