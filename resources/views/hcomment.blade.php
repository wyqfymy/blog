<!DOCTYPE HTML>
<html>
  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

    <link type="text/css" media="all" href="{{asset('home/index/css/autoptimize_2b0d4df713b8dbc54e6fc1c4b5b7e160_1.css')}}" rel="stylesheet" />

    <title>欲思博客- 关注前端和WordPress,分享福利和心得！</title>
    <script>window._deel = {
        name: '欲思博客',
        url: 'https://yusi123.com/wp-content/themes/yusi',
        ajaxpager: '',
        commenton: 0,
        roll: [3, 5],
        appkey: {
          tqq: '801497376',
          tsina: '3036462609'
        }
      }</script>
    <link rel='dns-prefetch' href='//libs.baidu.com' />
    <link rel='dns-prefetch' href='//s.w.org' />


    <script type='text/javascript' src='js/jquery.min_1.js'></script>
    <script type='text/javascript' src='js/jquery_1.js'></script>

    <link rel='https://api.w.org/' href='https://yusi123.com/wp-json/' />
    <meta name="keywords" content="欲思博客,网赚博客,福利,wordpress教程,前端开发">
    <meta name="description" content="欲思博客是一个关注前端开发、网站建设、wordpress主题的独立博客，有时也分享一些个人福利和网络赚钱心得！">
    <!--[if lt IE 9]>
<<<<<<< HEAD
      <script <img src="{{asset('home/index/js/html5_1.js')}}"></script>
      <script <img src="{{asset('home/index/js/selectivizr-min_1.js')}}"></script>
    <![endif]-->
    <!--[if lte IE 8]>
    <![endif]-->
    <script src="{{asset('home/index/js/selectivizr-min_1.js')}}"></script>

      <script src="js/html5_1.js"></script>
      <script src="js/selectivizr-min_1.js"></script>
    <!-- <![endif]--> -->
    <!--[if lte IE 8]>
    <![endif]-->

  </head>
  
  <body class="home blog">
    <header id="header" class="header">
      <div class="container-inner">
        <div class="yusi-logo">
          <a href="/">
            <h1>
              <span class="yusi-mono">欲思博客</span>
              <span class="yusi-bloger">&#8211; 关注前端和WordPress,分享福利和心得！</span></h1>
          </a>
        </div>
      </div>
      <!-- 导航(分类) -->
      <div id="nav-header" class="navbar">
        <ul class="nav">
          <li id="menu-item-3307" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-3307">
            <a href="/">首页</a></li>

          @foreach($data as $v)
              <li id="menu-item-3300" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-3300">
              <a href="">{{$v->cate_name}}</a>

                  @if(!empty($v->sub))
                  <ul class="sub-menu">
                  @foreach($v->sub as $vv)
                  
                      <li id="menu-item-3301" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-3301">
                      <a href="">{{$vv->cate_name}}</a></li>
                  @endforeach
                  </ul>
                  @endif
             </li>
          @endforeach 
          <li style="float:right;">
            <div class="toggle-search">
              <i class="fa fa-search"></i>
            </div>
            <div class="search-expand" style="display: none;">
              <div class="search-expand-inner">
                <form method="get" class="searchform themeform" onsubmit="location.href='https://yusi123.com/search/' + encodeURIComponent(this.s.value).replace(/%20/g, '+'); return false;" action="https://yusi123.com/">
                  <div>
                    <input type="ext" class="search" name="s" onblur="if(this.value=='')this.value='search...';" onfocus="if(this.value=='search...')this.value='';" value="search..."></div>
                </form>
              </div>
            </div>
          </li>
        </ul>
      </div>
      </div>
    </header>


 @yield('content')   


 <footer class="footer">
      <div class="footer-inner">
        <div class="copyright pull-left">
          <a href="https://yusi123.com/" title="欲思博客">欲思博客</a>版权所有，保留一切权利 ! Theme
          <a href="https://yusi123.com/3233.html">Yusi</a>·
          <a href="https://yusi123.com/sitemap.xml" title="站点地图">站点地图</a>© 2011-2014 ·
          <a href="http://www.miitbeian.gov.cn/" rel="nofollow" target="_blank">赣ICP备13005641号</a>· 托管于
          <a rel="nofollow" target="_blank" href="https://yusi123.com/go/aliyun">阿里云</a>&
          <a rel="nofollow" target="_blank" href="https://yusi123.com/go/qiniu">七牛</a></div>
        <div class="trackcode pull-right">

        </div>
      </div>
    </footer>
          <script src="js/z_stat_1.js" language="JavaScript"></script>
          <script>var _hmt = _hmt || []; (function() {
              var hm = document.createElement("script");
              hm.src = "//hm.baidu.com/hm.js?b52ad73b0742bc99858449915680c213";
              var s = document.getElementsByTagName("script")[0];
              s.parentNode.insertBefore(hm, s);
            })();</script>
        </div>
      </div>
    </footer>
    <script type='text/javascript' src='js/wp-embed.min_1.js'></script>

  </body>

</html>