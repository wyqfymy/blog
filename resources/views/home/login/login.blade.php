
<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>欢迎登录个人博客</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


        <!-- CSS -->
        <!-- <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'> -->
        <link rel="stylesheet" href="{{asset('home/login/css/reset.css')}}">
        <link rel="stylesheet" href="{{asset('home/login/css/supersized.css')}}">
        <link rel="stylesheet" href="{{asset('home/login/css/style.css')}}">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>
        <style type="text/css">
            #www{
                height:500px;
            }
            .code{
                position:relative;
                width:100px;
                left:-83px;
                top:0px;
            }
            #qqq{
                position:relative;
                width:100px;
                left:-31px;
                top:0px;
            }
            #nnn{
                position:relative;
                width:100px;
                left:3px;
                top:14px;
            }
            #vvv{
                position:relative;
                width:100px;

                left:204px;

                top:-2px;
            }
            #error{
                position:relative;
                width:227px;
                left:836px;
                top:233px;
            }
            #dl{
                 position:absolute;
                width:237px;
                left:20px;
                top:218px;
                height:93px;
            }
        </style>
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
        <div class="page-container" id="www">
            <h1>欢迎登录</h1>
            <form action="../home/dologin" method="post">
            {{csrf_field()}}
            <ul>
                <li>
                <input type="text" name="uname" class="username" placeholder="用户名">
                </li>
                <li>
                <input type="password" name="upassword" class="password" placeholder="密码">
                </li>
                <li>
                <input type="text" name="code" class="code" placeholder="验证码" ;>
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
                </script>
                </li>
                <li id="nnn">
                    <a href="">忘记密码</a>
                </li>
                
                <li id="dl">
                <button type="submit">登录</button>
                </li>
                <li id="vvv">

                    <a href="{{asset('/home/zc')}}">立即注册</a>

                </li>
            </ul>
            </form>
            
        </div>

            <div class="bj_right">
                <p>使用以下账号直接登录</p>
                <a href="#" class="glyphicon glyphicon-user">QQ登录</a>
                <a href="#" class="zhuce_wb">微博登录</a>
                <a href="#" class="zhuce_wx">微信登录</a>
            </div>



        <!-- Javascript -->
        <script src="{{asset('home/login/js/jquery-1.8.2.min.js')}}"></script>
        <script src="{{asset('home/login/js/supersized.3.2.7.min.js')}}"></script>
        <script src="{{asset('home/login/js/supersized-init.js')}}"></script>
        <script src="{{asset('home/login/js/scripts.js')}}"></script>
    </body>

</html>

