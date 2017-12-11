@extends('hcomment')
 @section('content')
           <div style="width:100%" class="content">
    <header class="article-header">
        <h1 class="article-title">
            <a href="https://yusi123.com/3736.html">
                {{$data->article_title}}
            </a>
        </h1>
        <div class="meta">
            
            <span class="muted">
                <i class="fa fa-user">
                </i>
                欲思
            </span>
            <time class="muted">
                <i class="fa fa-clock-o">
                </i>
               {{ date('Y-m-d H:i:s',$data->addtime)}}
            </time>
            <span class="muted" style="display:none;">
                <i class="fa fa-eye">
                </i>
                23343℃
            </span>
            <span class="muted">
                <i class="fa fa-comments-o">
                </i>
                <a href="https://yusi123.com/3736.html#comments">
                    22评论
                </a>
            </span>
        </div>
    </header>
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.js"></script>
   <script>
$("#con").html('{{$data->article_content}}');
   </script>
    <article id="con" class="article-content">
  
         {!!$data->article_content!!}
         </article>
    <footer class="article-footer">
        <div class="article-tags">
            <i class="fa fa-tags">
            </i>
            <a href="https://yusi123.com/tag/%e5%80%9f%e8%b4%b7%e5%ae%9d" rel="tag"
            data-original-title="" title="">
                借贷宝
            </a>
        </div>
    </footer>
   
   
    <div id="respond" class="no_webshot">
      
     
            <div class="comt-title">
                <div class="comt-avatar pull-left">
                    <img alt="" src="https://yusi123.com/avatar/54*.jpg" srcset="https://yusi123.com/avatar/108*.jpg"
                    class="avatar avatar-54 photo" height="54" width="54">
                </div>
                <div class="comt-author pull-left">
                    发表我的评论
                </div>

             
                <a id="cancel-comment-reply-link" class="pull-right" href="javascript:;">
                    取消评论
                </a>
            </div>
            <div class="comt">
                <div class="comt-box">
                    <textarea id="pcontent" placeholder="写点什么..." class="input-block-level comt-area" name="comment"
                    id="comment" cols="100%" rows="3" tabindex="1" onkeydown="if(event.ctrlKey&amp;&amp;event.keyCode==13){document.getElementById('submit').click();return false};">
                    </textarea>
                    <div class="comt-ctrl">
                        <button class="btn btn-primary pull-right" type="submit" name="submit"
                       id="go"  tabindex="5">
                      
                            提交评论
                        </button>
                        <div class="comt-tips pull-right">
                            <input type="hidden" name="comment_post_ID" value="3736" id="comment_post_ID">
                            <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                            <div class="comt-tip comt-loading" style="display: none;">
                                正在提交, 请稍候...
                            </div>
                            <div class="comt-tip comt-error" style="display: none;">
                                #
                            </div>
                        </div>
                        <span data-type="comment-insert-smilie" class="muted comt-smilie">
                            <i class="fa fa-smile-o">
                            </i>
                            表情
                        </span>
                        <span class="muted comt-mailme">
                            <label for="comment_mail_notify" class="checkbox inline" style="padding-top:0">
                                <input type="checkbox" name="comment_mail_notify" id="comment_mail_notify"
                                value="comment_mail_notify" checked="checked">
                                有人回复时邮件通知我
                            </label>
                        </span>
                    </div>
                </div>
                <div class="comt-comterinfo" id="comment-author-info">
                    <h4>
                        Hi，您需要填写昵称和邮箱！
                    </h4>
                    <ul>
                        <li class="form-inline">
                            <label class="hide" for="author">
                                昵称
                            </label>
                            <input class="ipt" type="text" name="author" id="author" value="" tabindex="2"
                            placeholder="昵称">
                            <span class="help-inline">
                                昵称 (必填)
                            </span>
                        </li>
                        <li class="form-inline">
                            <label class="hide" for="email">
                                邮箱
                            </label>
                            <input class="ipt" type="text" name="email" id="email" value="" tabindex="3"
                            placeholder="邮箱">
                            <span class="help-inline">
                                邮箱 (必填)
                            </span>
                        </li>
                        <li class="form-inline">
                            <label class="hide" for="url">
                                网址
                            </label>
                            <input class="ipt" type="text" name="url" id="url" value="" tabindex="4"
                            placeholder="网址">
                            <span class="help-inline">
                                网址
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
 
    </div>
    
    <div id="postcomments">
        <div id="comments">
            <i class="fa fa-comments-o">
            </i>
            <b>
                (22)
            </b>
            个小伙伴在吐槽
        </div>
        <ol class="commentlist">
            <li class="comment even thread-even depth-1" id="comment-16846">
                <div class="c-avatar">
                    <img alt="" data-original="https://yusi123.com/avatar/54*022e8dfea65a77afaed6fe03f04750eb.jpg"
                    srcset="https://yusi123.com/avatar/108*022e8dfea65a77afaed6fe03f04750eb.jpg"
                    class="avatar avatar-54 photo" height="54" width="54" src="https://yusi123.com/wp-content/themes/yusi/img/default.png">
                    <div class="c-main" id="div-comment-16846">
                        没玩过这个不知道怎样
                        <div class="c-meta">
                            <span class="c-author">
                                <a href="http://www.dashanseo.com" rel="external nofollow" class="url"
                                target="_blank">
                                    大山SEO博客
                                </a>
                            </span>
                            2016-09-12 01:57
                            <a rel="nofollow" class="comment-reply-link" href="https://yusi123.com/3736.html?replytocom=16846#respond"
                            onclick="return addComment.moveForm( &quot;div-comment-16846&quot;, &quot;16846&quot;, &quot;respond&quot;, &quot;3736&quot; )"
                            aria-label="回复给大山SEO博客">
                                回复
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-14901">
                <div class="c-avatar">
                    <img alt="" data-original="https://yusi123.com/avatar/54*7a7da737791fe2e4a799ab825d2ee331.jpg"
                    srcset="https://yusi123.com/avatar/108*7a7da737791fe2e4a799ab825d2ee331.jpg"
                    class="avatar avatar-54 photo" height="54" width="54" src="https://yusi123.com/wp-content/themes/yusi/img/default.png">
                    <div class="c-main" id="div-comment-14901">
                        这个很赚钱呀，现在很多群里在放这个单子。
                        <div class="c-meta">
                            <span class="c-author">
                                在家购物网
                            </span>
                            2016-04-16 15:39
                            <a rel="nofollow" class="comment-reply-link" href="https://yusi123.com/3736.html?replytocom=14901#respond"
                            onclick="return addComment.moveForm( &quot;div-comment-14901&quot;, &quot;14901&quot;, &quot;respond&quot;, &quot;3736&quot; )"
                            aria-label="回复给在家购物网">
                                回复
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="comment even thread-even depth-1" id="comment-14733">
                <div class="c-avatar">
                    <img alt="" data-original="https://yusi123.com/avatar/54*ee15e5aa56f49957a67a67465f525024.jpg"
                    srcset="https://yusi123.com/avatar/108*ee15e5aa56f49957a67a67465f525024.jpg"
                    class="avatar avatar-54 photo" height="54" width="54" src="https://yusi123.com/wp-content/themes/yusi/img/default.png">
                    <div class="c-main" id="div-comment-14733">
                        去年这个好像是挺火的，大家都在弄这个东西。
                        <div class="c-meta">
                            <span class="c-author">
                                <a href="http://www.zmlcsy.com" rel="external nofollow" class="url" target="_blank">
                                    蓬勃财经直播室
                                </a>
                            </span>
                            2016-03-02 14:50
                            <a rel="nofollow" class="comment-reply-link" href="https://yusi123.com/3736.html?replytocom=14733#respond"
                            onclick="return addComment.moveForm( &quot;div-comment-14733&quot;, &quot;14733&quot;, &quot;respond&quot;, &quot;3736&quot; )"
                            aria-label="回复给蓬勃财经直播室">
                                回复
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-14168">
                <div class="c-avatar">
                    <img alt="" data-original="https://yusi123.com/avatar/54*0e32326b92fe6f2867e7067c02e0a7a8.jpg"
                    srcset="https://yusi123.com/avatar/108*0e32326b92fe6f2867e7067c02e0a7a8.jpg"
                    class="avatar avatar-54 photo" height="54" width="54" src="https://yusi123.com/wp-content/themes/yusi/img/default.png">
                    <div class="c-main" id="div-comment-14168">
                        好像被查封了
                        <div class="c-meta">
                            <span class="c-author">
                                <a href="http://WWW.UFOET.CN" rel="external nofollow" class="url" target="_blank">
                                    小辉辉
                                </a>
                            </span>
                            2015-12-23 20:34
                            <a rel="nofollow" class="comment-reply-link" href="https://yusi123.com/3736.html?replytocom=14168#respond"
                            onclick="return addComment.moveForm( &quot;div-comment-14168&quot;, &quot;14168&quot;, &quot;respond&quot;, &quot;3736&quot; )"
                            aria-label="回复给小辉辉">
                                回复
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="comment even thread-even depth-1" id="comment-13995">
                <div class="c-avatar">
                    <img alt="" data-original="https://yusi123.com/avatar/54*be91f45f4f0fa858fd16441e657865ca.jpg"
                    srcset="https://yusi123.com/avatar/108*be91f45f4f0fa858fd16441e657865ca.jpg"
                    class="avatar avatar-54 photo" height="54" width="54" src="https://yusi123.com/wp-content/themes/yusi/img/default.png">
                    <div class="c-main" id="div-comment-13995">
                        确实是不错的哦！！
                        <div class="c-meta">
                            <span class="c-author">
                                <a href="http://www.lin58.com" rel="external nofollow" class="url" target="_blank">
                                    网络营销博客
                                </a>
                            </span>
                            2015-12-06 13:16
                            <a rel="nofollow" class="comment-reply-link" href="https://yusi123.com/3736.html?replytocom=13995#respond"
                            onclick="return addComment.moveForm( &quot;div-comment-13995&quot;, &quot;13995&quot;, &quot;respond&quot;, &quot;3736&quot; )"
                            aria-label="回复给网络营销博客">
                                回复
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        </ol>
        <div class="commentnav">
            <a class="prev page-numbers" href="https://yusi123.com/3736.html/comment-page-1#comments">
                «
            </a>
            <a class="page-numbers" href="https://yusi123.com/3736.html/comment-page-1#comments">
                1
            </a>
            <span class="page-numbers current">
                2
            </span>
        </div>
    </div>
</div>
  <script>
                    $("#go").on('click',function () {
                          alert('123');
                          var uid = '44';
                        var con = $("#pcontent").val();
                        $.ajax({
                            url:'{{url('/home/pinglun')}}',
                            type:'post',
                            data:{'_token':'{{ csrf_token() }}','con':con,'uid':uid,'article_id':'{{$data->article_id}}'},
                            success:function (data){
                                alert(data);
                                console.log(data);
                            }
                        })
                    })
                </script>
        @stop