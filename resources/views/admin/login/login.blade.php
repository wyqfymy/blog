<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('style/font/css/font-awesome.min.css')}}">
    <style>
        #error{
            margin:0 auto;
            margin-left: 400px;
        }
        #bd{
            /*height:650px;*/
            background: url("{{url('style/img/2.jpg')}}") no-repeat;
            background-size: 100% 110%;
        }
    </style>
</head>
<body id="bd">
<div class="login_box">
    <h1>Blog</h1>
    <h2>欢迎使用博客管理平台</h2>
    <div id="error">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
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
    <br>

    <div class="form">
        {{--<p style="color:red">用户名错误</p>--}}
        <form action="{{url('admin/dologin')}}" method="post">
            {{csrf_field()}}
            <ul>
                <li>
                    <input type="text" name="admin_name" class="text" placeholder="用户名"/>
                    <span><i class="fa fa-user"></i></span>
                </li>
                <li>
                    <input type="password" name="admin_password" class="text" placeholder="密 码"/>
                    <span><i class="fa fa-lock"></i></span>
                </li>
                <li>
                    <input type="text" class="code" name="code" placeholder="验证码"/>
                    <span><i class="fa fa-check-square-o"></i></span>
                    <!-- {{--onclick后面的目的是 点击的时候(带?后面参数)浏览器认为一个新的地址会重新请求 -->
                    <!-- 不带参数的话浏览一次后,浏览器会在本地缓存中找 不会像远程请求 - (路径没改变 参数变化)-}} -->
                    <!-- {{--<img src="{{url('admin/yzm')}}" onclick="this.src='{{url('admin/yzm')}}?' + Math.random()" alt="">--}} -->

                    <!-- {{--单击触发 下面re_captcha方法 用captcha php中要有gdk库--}} -->
                    <a onclick="javascript:re_captcha();">
                        <img src="{{ URL('code/captcha/98') }}" id="127ddf0de5a04167a9e427d883690ff6" alt="电磁">
                    </a>
                    <script>
                        function re_captcha(){
                            $url = "{{ URL('/code/captcha') }}";
                            $url = $url + '/' + Math.random();
                            console.log($url);
                            document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $url;
                        }
                    </script>
                </li>

                <li>
                    <input type="submit" value="登录登陆"/>
                </li>
            </ul>
        </form>
        <p><a href="#">返回首页</a> &copy; 2017 Powered by <a href="http://www.itxdl.cn" target="_blank">http://www.itxdl.cn</a></p>
    </div>
</div>
</body>
</html>