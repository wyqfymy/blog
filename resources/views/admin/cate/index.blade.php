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
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">后台分类列表</strong> / <b> <a href="{{url('admin/cate/create')}}">添加分类</a> </b>
                
                @if (session('msg'))
                <b class="msgb" style="color:red; font-size:15px">{{session('msg')}}</b>
                    <script>
                        setTimeout(function(){
                            $('.msgb').empty().remove();

                        },2000);
                    </script>
                            
                @endif
                </div>
            </div>
            <div class="am-g">
                <div class="am-u-sm-12">
                    <table class="am-table am-table-hover table-bordered">                
                        <thead>
                            <tr>
                                 <th class="text-center"> 排序字段</th>
                                <th align="center" class="text-center"> 分类ID</th>
                                <th align="center" class="text-center"> 分类名称</th>
                                <th align="center" class="text-center"> 父ID</th>
                                <th align="center" class="text-center">操作</th>                   
                             </tr>
                        </thead>
                        <tbody> 
                           
                           
                        @foreach($cates as $key=>$val)
                            <tr>
                                <!-- onchange 在元素值改变时触发。onchange 属性适用于：<input>、<textarea> 以及 <select> 元素。 -->
                                <td align="center">
                                    <input type="text" style="width:20px" id="aa" onchange="changeorder(this,{{$val['cate_id']}});" value="{{$val['cate_order']}}">
                                </td>

                                <td align="center">{{$val['cate_id']}}</td>

                                <td style="text-indent:20px">{{$val['cate_names']}}</td>
                                <td align="center">{{$val['pid']}}</td>
                              <!--   {{--//onclick 负责执行计算函数 void是一个操作符 void(0)返回undefined 地址不发生跳转--}} -->
                                <td align="center">
                                    <a href="{{url('admin/cate/'.$val['cate_id'].'/edit')}}" >修改</a>
                                    <a href="javascript:;" onclick="delCate({{$val['cate_id']}})">删除</a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>

            </div>
        </div>
        </div>

        <script type="text/javascript">

            function changeorder(a,b)
            {
                // alert(111);

                var cate_order = $(a).val();
                alert(cate_order);
                $.post("{{url('admin/cate/changeorder')}}",{'_token':"{{csrf_token()}}","cate_id":b,"cate_order":cate_order},function(data){
                //如果排序成功，提示排序成功
                    if(data.status == 0){
                        layer.msg(data.news,{icon: 6});
                        location.href = location.href;
                    }else{
                        //如果排序失败，提示排序失败
                        layer.msg(data.news,{icon: 5});
                        location.href = location.href;
                    }
                })
            }

            function delCate(id)
            {
                //alert('aaaaaa');
                layer.confirm('您确定删除吗?',{btn:['确认','取消']}, function(){
                    //如果用户ajax向服务器发出删除请求
                    //原生四步 1.new对象 2 监听 3请求 4 发送
                    //jquery ajax(3)1.$.get 2. $.post 3.$.ajax
    //                $.get('请求服务器路径', '携带的参数', '获取执行成功后的返回值');
                   //资源路由 ajax写法
                   
                    $.post("{{url('admin/cate/')}}/" + id, {'_token':"{{csrf_token()}}","_method":"delete"}, function(data){    
                        
                       if(data.error == 0){
                            layer.msg(data.msg,{icon: 6});
                            var t = setTimeout("location.href = location.href;",500);
                        }else if(data.error == 1){
                            //如果排序失败，提示排序失败
                            layer.msg(data.msg,{icon: 5});
                            var t = setTimeout("location.href = location.href;",500);
                        }else{
                            layer.msg(data.msg,{icon: 5});
                            var t = setTimeout("location.href = location.href;",500);
                        }
                      
                    });

                 });


            }

    </script>

@stop

<!-- <td value="{{$val['pid']}}">{{$val['pid']}}</td> -->




