<html >
 <head>


 </head>
 <body data-type="generalComponents" >
   @extends('common') @section('content')     
  <style>
.am-u-sm-3 {
    width: 10%;
}
.am-u-sm-9 {
    width: 88%;
}
</style>  

  <div class="tpl-page-container tpl-page-header-fixed" style="margin-top:0px;"> 
  
   <div class="tpl-content-wrapper"> 
    <div class="tpl-portlet-components"  > 
     <div class="portlet-title"  > 
      <div class="caption font-green bold"> 
       <span class="am-icon-code"></span> 表单 
      </div> 
      <div class="tpl-portlet-input tpl-fz-ml"> 
       <div class="portlet-input input-small input-inline"> 
       </div> 
      </div> 
      <div class="tpl-block"> 
       <div class="am-g"> 
        <div class="tpl-form-body tpl-form-line"> 
         <form class="am-form tpl-form-line-form"> 
          <div class="am-form-group" > 
          
          </div> 
          <div class="am-form-group"> 
           <label for="user-phone" class="am-u-sm-3 am-form-label">标题 <span class="tpl-form-line-small-title">title</span></label> 
           <div class="am-u-sm-9"> 
            
             <input type="text" class="tpl-form-input" name="article_title" id="inputtitle" placeholder="请输入标题文字" /> 
            <small>请填写标题文字10-20字左右。</small> 
           </div> 
          </div>
           <div class="am-form-group"> 
           <label for="user-phone" class="am-u-sm-3 am-form-label">发布板块 <span class="tpl-form-line-small-title">Author</span></label> 
           <div class="am-u-sm-9"> 
            <select id="inputbankuai" data-am-selected="{searchBox: 1}"> 
                @foreach($res as $k=>$v)
                    @if( !empty($v->sub) )
                
                        <option value="{{$v->cate_id}}" disabled>{{$v->cate_name}}</option>
                             @foreach($v->sub as $vv)
                                <option value="{{$vv->cate_id}}">———{{$vv->cate_name}}</option>
                            @endforeach
                    @else
                        <option value="{{$v->cate_id}}" >{{$v->cate_name}}</option>
                    @endif 
                @endforeach
            </select> 
          
           </div> 
          </div>  
          <div class="am-form-group"> 
           <label for="user-weibo" class="am-u-sm-3 am-form-label">封面图 <span class="tpl-form-line-small-title">Images</span></label> 
           <div class="am-u-sm-9"> 
            <div class="am-form-group am-form-file"> 
             <div class="tpl-form-file-img"> 

              <img id="suo" width="200px" alt="" /> 
             </div> 
             <button type="button" class="am-btn am-btn-danger am-btn-sm"> <i class="am-icon-cloud-upload"></i> 添加封面图片</button> 
             <input id="file_upload" type="file" multiple="" /> 
            </div> 
           </div> 
          </div> 
          
        
          <div class="am-form-group"> 
           <label for="user-weibo" class="am-u-sm-3 am-form-label">添加标签 <span class="tpl-form-line-small-title">Type</span></label> 
           <div class="am-u-sm-9"> 
            <input type="text" id="inputbiaoqian" placeholder="请添加分类用%号隔开" /> 
            <div> 
            </div> 
           </div> 
          </div> 
          <div class="am-form-group"> 
           <label for="user-intro" class="am-u-sm-3 am-form-label">允许评论</label> 
           <div class="am-u-sm-9"> 
            <div class="tpl-switch"> 
             <input type="checkbox" id="inputpinglun" class="ios-switch bigswitch tpl-switch-btn" name='qwe' value="123" /> 
             <div class="tpl-switch-btn-view"> 
              <div> 
              </div> 
             </div> 
            </div> 
           </div> 
          </div> 
          <div class="am-form-group"> 
           <label for="user-intro" class="am-u-sm-3 am-form-label">文章内容</label> 
           <div class="am-u-sm-9"> 
            <script type="text/javascript" charset="utf-8" src="{{asset('/ueditor/ueditor.config.js')}}"></script> 
            <script type="text/javascript" charset="utf-8" src="{{asset('/ueditor/ueditor.all.min.js')}}"> </script> 
            <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败--> 
            <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文--> 
            <script type="text/javascript" charset="utf-8" src="{{asset('/ueditor/lang/zh-cn/zh-cn.js')}}"></script> 
            <script id="editor" name="art_content" type="text/plain" style="width:92%;height:800px;"></script> 
            <script>
                                var ue = UE.getEditor('editor');

                                
                            </script> 
            <style>
                                .edui-default{line-height: 28px;}
                                div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                                {overflow: hidden; height:20px;}
                                div.edui-box{overflow: hidden; height:22px;}
                            </style> 
           </div> 
          </div> 
          <div class="am-form-group"> 
                  
           </div> 
          </div> 
         </form> 
       
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
    
   </div>   

  <script type="text/javascript">
          //ajax
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



          var suoimg = '';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function () {
                $("#file_upload").change(function () {
                    $('img1').show();
                    uploadImage();
                });
            });
                function uploadImage() {
                // 判断是否有选择上传文件
                var imgPath = $("#file_upload").val();
                if (imgPath == "") {
                    alert("请选择上传图片！");
                    return;
                }
                //判断上传文件的后缀名
                var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                if (strExtension != 'jpg' && strExtension != 'gif'
                    && strExtension != 'png' && strExtension != 'bmp') {
                    alert("请选择图片文件");
                    return;
                }
                // var formData = new FormData($('#art_form')[0]);
                var formData = new FormData();
                formData.append('file_upload', $('#file_upload')[0].files[0]);
                formData.append('_token',"{{csrf_token()}}");
                $.ajax({
                    type: "POST",
                    url: "{{url('/admin/upload')}}",
                    data: formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        var src = "{{url('/uploads')}}" + '/' +data;
                        $("#suo").attr('src',src);
                        suoimg = data;
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("上传失败，请检查网络后重试");
                    }
                });
            }


            //提交动作
            $("#go").on('click',function(){

                //变量设置
                var title = $("#inputtitle").val();
                var bankuai = $("#inputbankuai").val();
                var biaoqian = $("#inputbiaoqian").val();

                if( $('input[name="qwe"]:checked')){
                    var pinglun = $('input[name="qwe"]').val();
                }
                    //加载框
                var loading = setTimeout(function(){
                    var index = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
                    // 设置取消 加载
                    setTimeout(function() {
                        layer.close(index);
                        console.log(ue.body.innerHTML);
                        ajax();
                        qwe();
                    }, 4000);
                },100)
                    //
                function qwe(){             
                    layer.msg('添加成功!');
                }

            });

            function ajax(){
            var title = $("#inputtitle").val();
            var bankuai = $("#inputbankuai").val();
            var biaoqian = $("#inputbiaoqian").val();




                $.ajax({
                    url:'{{url('/admin/article/create')}}',
                    type:'POST',
                    data:{'title':title,'bankuai':bankuai,'biaoqian':biaoqian,'suoimg':suoimg,'_token':'{{ csrf_token() }}','content':ue.body.innerHTML},
                    success:function 
                    (data) {
                        alert('你的标题是：'+data);
                    }
           
          
                 })
           }

        </script> 

    
   @stop
  </div>
 </body>
</html> 

<div  style="width:100%;background-color:#ccc;position:fixed; z-index:1000;bottom:0;" >
<center style="margin:10px auto">
        <button type="button" id="go" style="content:center;" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
 </center>


</div>