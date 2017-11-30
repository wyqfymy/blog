 @extends('common')
 
   @section('content')
           
     
        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                博客后台管理系统
            </div>
            <ol class="am-breadcrumb">
                <li><a href="#" class="am-icon-home">首页</a></li>
       
            </ol>
            <div class="tpl-content-scope">
                <div class="note note-info">
                    <h3>强大的后台上线了!
                        <span class="close" data-close="note"></span>
                    </h3>
                    <p>强大的博客管理系统
                    <p><span class="label label-danger">提示:</span> 有最新版本,请升级!
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="am-icon-comments-o"></i>
                        </div>
                        <div class="details">
                            <div class="number"> 13 </div>
                            <div class="desc"> 新评论 </div>
                        </div>
                        <a class="more" href="#"> 查看更多
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
                    </div>
                </div>
                <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
                    <div class="dashboard-stat red">
                        <div class="visual">
                            <i class="am-icon-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number"> 6 </div>
                            <div class="desc"> 最新文章 </div>
                        </div>
                        <a class="more" href="#"> 查看更多
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
                    </div>
                </div>
                <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="am-icon-apple"></i>
                        </div>
                        <div class="details">
                            <div class="number"> 653 </div>
                            <div class="desc"> 新注册用户 </div>
                        </div>
                        <a class="more" href="#"> 查看更多
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
                    </div>
                </div>
                <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
                    <div class="dashboard-stat purple">
                        <div class="visual">
                            <i class="am-icon-android"></i>
                        </div>
                        <div class="details">
                            <div class="number"> 0 </div>
                            <div class="desc"> 手机用户 </div>
                        </div>
                        <a class="more" href="#"> 查看更多
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
                    </div>
                </div>



            </div>

            <div class="row">
			<div class="am-u-md-12 am-u-sm-12 row-mb">
                    <div class="tpl-portlet">
                        <div class="tpl-portlet-title">
                            <div class="tpl-caption font-red ">
                                <i class="am-icon-bar-chart"></i>
                                <span> 活跃用户排行榜</span>
                            </div>
                            <div class="actions">
                                <ul class="actions-btn">
                                    <li class="purple-on">昨天</li>
                                    <li class="green">前天</li>
                                    <li class="dark">本周</li>
                                </ul>
                            </div>
                        </div>
                        <div class="tpl-scrollable">
                            <div class="number-stats">
                                <div class="stat-number am-fl am-u-md-6">
                                    <div class="title am-text-right"> Total </div>
                                    <div class="number am-text-right am-text-warning"> 2460 </div>
                                </div>
                                <div class="stat-number am-fr am-u-md-6">
                                    <div class="title"> Total </div>
                                    <div class="number am-text-success"> 2460 </div>
                                </div>

                            </div>

                            <table class="am-table tpl-table">
                                <thead>
                                    <tr class="tpl-table-uppercase">
                                        <th>人员</th>
                                        <th>积分</th>
                                        <th>评论数</th>
                                        <th>点赞率</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="assets/img/user01.png" alt="" class="user-pic">
                                            <a class="user-name" href="###">禁言小张</a>
                                        </td>
                                        <td>￥3213</td>
                                        <td>65</td>
                                        <td class="font-green bold">26%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/img/user02.png" alt="" class="user-pic">
                                            <a class="user-name" href="###">Alex.</a>
                                        </td>
                                        <td>￥2635</td>
                                        <td>52</td>
                                        <td class="font-green bold">32%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/img/user03.png" alt="" class="user-pic">
                                            <a class="user-name" href="###">Tinker404</a>
                                        </td>
                                        <td>￥1267</td>
                                        <td>65</td>
                                        <td class="font-green bold">51%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/img/user04.png" alt="" class="user-pic">
                                            <a class="user-name" href="###">Arron.y</a>
                                        </td>
                                        <td>￥657</td>
                                        <td>65</td>
                                        <td class="font-green bold">73%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/img/user05.png" alt="" class="user-pic">
                                            <a class="user-name" href="###">Yves</a>
                                        </td>
                                        <td>￥3907</td>
                                        <td>65</td>
                                        <td class="font-green bold">12%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/img/user06.png" alt="" class="user-pic">
                                            <a class="user-name" href="###">小黄鸡</a>
                                        </td>
                                        <td>￥900</td>
                                        <td>65</td>
                                        <td class="font-green bold">10%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


           



        </div>

   @stop