 @extends('common')
 
 @section('content')
<style type="text/css">
	#www
	{
		position:absolute;
		left:1081px;
		top:65px;
		width:373px;
		height:23px;
		z-index:2;
	}
</style>
<div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">后台用户</strong> / <small>几个后台的用户</small></div>
      </div>

      <div class="am-g">
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
                      <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span><a href="edit/{{$v->admin_id}}">编辑</a></button>
                      <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> <a href="del/{{$v->admin_id}}">删除</a></button>
                    </div>
                  </div>
              </td>
            </tr>
			@endforeach

            </tbody>
          </table>
        </div>
        <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.js"></script>

      		<div class="am-fr">
      			<ul id="sunjia" class="am-pagination">
      			<li class="am-disabled">
                {!! $data->appends($request->all())->render() !!}
                </li>
                </ul>
            </div>
            <script type="text/javascript">
	
			$("#sunjia li ul").attr('class','am-pagination');
		</script>
  </div>
 @stop