<!Doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>欢迎注册个人博客</title>
	<meta name="keywords" content="个人博客">
	<meta name="content" content="个人博客">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link type="text/css" rel="stylesheet" href="{{asset('home/register/css/login.css')}}">
    <script type="text/javascript" src="{{asset('home/register/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>

</head>
<body class="login_bj" >
<style type="text/css">
	#code{
		position:relative;
		height:32px;
		width:132px;
		left:-1px;
		top:-14px;
	}
	#error{
		position:relative;
		height:32px;
		width:132px;
		left:324px;
		top:98px;
		z-index:10000;
	}
	#qwer{
		position:relative;
		height:32px;
		width:132px;
		left:355px;
		top:357px;
		
	}
</style>
		
<div class="zhuce_body">

    <div class="zhuce_kong">
    	<div class="zc">
    	<div id="error">
        @if (count($errors) > 0)
            <div class="alert alert-danger" >
                <ul>
                    @if(is_object($errors))
                        @foreach ($errors->all() as $error)
                            <li style="color:red">{{ $error }}</li>
                        @endforeach
                    @else
                        <li style="color:red">{{ $errors }}</li>
                    @endif
                </ul>
            </div>
        @endif
        </div>
        	<div class="bj_bai">
            <h3>欢迎注册</h3>
       	  	  <form action="{{asset('/home/dozc')}}" method="post">
       	  	  	{{csrf_field()}}
       	  	  	<input name="uname" type="text" class="kuang_txt phone" placeholder="用户名" id="uname">
                <input name="upassword" type="password" class="kuang_txt possword" placeholder="密码" id="upassword">
                <input name="urepassword" type="password" class="kuang_txt possword" placeholder="再次输入密码" id="urepassword">
                
                <input type="code" id="code" name="code" class="kuang_txt possword" placeholder="验证码" ;>
                <span><i class="fa fa-check-square-o" ></i></span>
                <a onclick="javascript:re_captcha();">
                        <img class="qqq" src="{{ URL('code/captcha/98') }}" id="127ddf0de5a04167a9e427d883690ff6" alt="电磁">
                </a>
                
                <script>
                        function re_captcha(){
                            $url = "{{ URL('/code/captcha') }}";
                            $url = $url + '/' + Math.random();
                            console.log($url);
                            document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $url;
                        }

                        $('#uname').on('blur',function(){

                        	var res = $(this).val();
							var a = /[a-zA-Z0-9]{3,8}/;
							var result= res.match(a);
                        	// console.log(res);
	                        	
	                        		$.ajax({
	                        		type:"post",
	                        		data:{"uname":res,"_token":"{{csrf_token()}}"},
	                        		
	                        		url:"{{url('home/uname')}}",
	                        		
	                        		success:function(data){
	                        			if(data){
	                        				layer.msg("这个用户名 已经存在了",{icon:6});
	                        				$('#uname').val('');
	                        			}

	                        		},
	                        		dataType:"json"
	                        	});
								if(!result){
									layer.msg("用户名必须字母数字3到8位",{icon:6});
									$('#uname').val('');
								}
                        	
                        	
                        });

					

						
                </script>
                
                <button type="submit" class="btn_zhuce" id="button" value="注册">注册</button>
                
                </form>
            </div>
        	<div id="qwer" class="btn_zhuce">
            	<a href="{{asset('home/hlogin')}}">立即登录</a>
            </div>
        </div>

    </div>

</div>
    


</body>
</html>