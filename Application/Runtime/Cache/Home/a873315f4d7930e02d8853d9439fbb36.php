<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>企业网站模板</title>
        <link rel="stylesheet" href="/luoliwuxie/Public/Home/css/amazeui.css" />
        <link rel="stylesheet" href="/luoliwuxie/Public/Home/css/common.min.css" />
        <link rel="stylesheet" href="/luoliwuxie/Public/Home/css/contact.min.css" />

        <link rel="stylesheet" href="/luoliwuxie/Public/Home/css/style.css">

        <style type="text/css">
        body, html{width: 100%;height: 100%;margin:0;}
        #allmap {width:600px;height:500px;overflow: hidden;}

        dl,dt,dd,ul,li{
            margin:0;
            padding:0;
            list-style:none;
        }
        p{font-size:12px;}
        dt{
            font-size:14px;
            font-family:"微软雅黑";
            font-weight:bold;
            border-bottom:1px dotted #000;
            padding:5px 0 5px 5px;
            margin:5px 0;
        }
        dd{
            padding:5px 0 0 5px;
        }
        li{
            line-height:28px;
        }
        .am-sticky {position: fixed !important;
            z-index: 1010;
            -webkit-transform-origin: 0 0;
            -ms-transform-origin: 0 0;
            transform-origin: 0 0;
        }
        </style>
    <!--这里要替换你的key  ak=你的key -->
<!--<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=hmREmCi2VbkCBBUtcD2QpPl3FuI5ymBD"></script>-->
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=3ac1342b68fec1069cd54e9af77f7b05"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/DrawingManager/1.4/src/DrawingManager_min.js"></script>
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<title>绘制点并获取当前点的坐标</title>
</head>
<body>
<div class="layout">
    <!--===========layout-header================-->
    <div class="layout-header am-hide-sm-only">
    <!--topbar start-->
    <div class="topbar">
        <div class="container">
            <div class="am-g">
                <div class="am-u-md-3">
                    <div class="topbar-left">
                        <i class="am-icon-globe"></i>
                        <div class="am-dropdown" data-am-dropdown>
                            <button class="am-btn am-btn-primary am-dropdown-toggle" data-am-dropdown-toggle>Language <span class="am-icon-caret-down"></span></button>
                            <ul class="am-dropdown-content">
                                <li><a href="#">English</a></li>
                                <li class="am-divider"></li>
                                <li><a href="#">Chinese</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="am-u-md-9">
                    <div class="topbar-right am-text-right am-fr">
                        Follow us
                        <i class="am-icon-facebook"></i>
                        <i class="am-icon-twitter"></i>
                        <i class="am-icon-google-plus"></i>
                        <i class="am-icon-pinterest"></i>
                        <i class="am-icon-instagram"></i>
                        <i class="am-icon-linkedin"></i>
                        <i class="am-icon-youtube-play"></i>
                        <i class="am-icon-rss"></i>
                        <?php if(empty($_SESSION['u_id'])): ?><a href="<?php echo u('Index/login');?>">登录</a>
                            <a href="<?php echo u('Index/register');?>">注册</a>
                        <?php else: ?>
                            欢迎<?php echo (session('account')); ?>
                            <a href="<?php echo u('Index/logout');?>">退出</a><?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--topbar end-->


    <div class="header-box" data-am-sticky >
        <!--header start-->
        <div class="logo" style="float:left;margin-left:-160px;margin-top:10px;position: fixed;">
            <div id="hovertreemarquee">
                <div><span> Hello ❤ PHP ❤ Thinkphp</span></div>
                <div aria-hidden="true"><span> Hello ❤ PHP ❤ Thinkphp</span></div>
            </div>
        </div>
        <div class="container">
            <div class="header">
                <div class="am-g">

                    <div class="am-u-md-10">
                        <div class="header-right am-fr">

                            <div class="header-contact">
                                <div class="header_contacts--item">
                                    <div class="contact_mini">
                                        <i style="color:#7c6aa6" class="contact-icon am-icon-phone"></i>
                                        <strong>0 (855) 233-5385</strong>
                                        <span>周一~周五, 8:00 - 20:00</span>
                                    </div>
                                </div>
                                <div class="header_contacts--item">
                                    <div class="contact_mini">
                                        <i style="color:#7c6aa6" class="contact-icon am-icon-envelope-o"></i>
                                        <strong>cn@yunshipei.com</strong>
                                        <span>随时欢迎您的来信！</span>
                                    </div>
                                </div>
                                <div class="header_contacts--item">
                                    <a href="<?php echo u('Index/contact');?>">
                                        <div class="contact_mini">
                                            <i style="color:#7c6aa6" class="contact-icon am-icon-map-marker"></i>
                                            <strong>洛理武协,</strong>
                                            <span>河南省洛阳市洛阳理工学院</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <a href="<?php echo u('Index/contact');?>" class="contact-btn">
                                <button type="button" class="am-btn am-btn-secondary am-radius">联系我们</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header end-->


        <!--nav start-->
        <div class="nav-contain">
            <div class="nav-inner">
                <ul class="am-nav am-nav-pills am-nav-justify">
                    <li class=""><a href="<?php echo u('Index/index');?>">首页</a></li>
                    <li>
                        <a href="#">产品中心</a>
                        <!-- sub-menu start-->
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="html/product1.html">产品展示1</a></li>
                            <li class="menu-item"><a href="html/product2.html">产品展示2</a></li>
                            <li class="menu-item"><a href="html/product3.html">产品展示3</a></li>
                        </ul>
                        <!-- sub-menu end-->
                    </li>
                    <li><a href="html/example.html">客户案例</a></li>
                    <li><a href="html/solution.html">解决方案</a></li>
                    <li>
                        <a href="<?php echo u('Index/news');?>?status=1">消息中心</a>
                        <!-- sub-menu start-->
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="<?php echo u('Index/news');?>?status=1">西分会</a></li>
                            <li class="menu-item"><a href="<?php echo u('Index/news');?>?status=2">东分会</a></li>
                            <li class="menu-item"><a href="<?php echo u('Index/news');?>?status=3">北分会</a></li>
                        </ul>
                        <!-- sub-menu end-->
                    </li>
                    <li><a href="html/about.html">关于我们</a></li>
                    <li><a href="html/join.html">加入我们</a></li>
                    <li><a href="<?php echo u('Index/contact');?>">联系我们</a></li>
                </ul>
            </div>
        </div>
        <!--nav end-->
    </div>
</div>

<!--mobile header start-->
<div class="m-header">
    <div class="am-g am-show-sm-only">
        <div class="am-u-sm-2">
            <div class="menu-bars">
                <a href="#doc-oc-demo1" data-am-offcanvas="{effect: 'push'}"><i class="am-menu-toggle-icon am-icon-bars"></i></a>
                <!-- 侧边栏内容 -->
                <nav data-am-widget="menu" class="am-menu  am-menu-offcanvas1" data-am-menu-offcanvas >
                    <a href="javascript: void(0)" class="am-menu-toggle"></a>

                    <div class="am-offcanvas" >
                        <div class="am-offcanvas-bar">
                            <ul class="am-menu-nav am-avg-sm-1">
                                <li><a href="./index.html" class="" >首页</a></li>
                                <li class="am-parent">
                                    <a href="#" class="" >产品中心</a>
                                    <ul class="am-menu-sub am-collapse ">
                                        <li class="">
                                            <a href="html/product1.html" class="" >产品展示1</a>
                                        </li>
                                        <li class="">
                                            <a href="html/product2.html" class="" >产品展示2</a>
                                        </li>
                                        <li class="">
                                            <a href="html/product3.html" class="" >产品展示3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class=""><a href="html/example.html" class="" >客户案例</a></li>
                                <li class=""><a href="html/solution.html" class="" >解决方案</a></li>
                                <li class="am-parent">
                                    <a href="<?php echo u('Index/news');?>?status=1" class="" >消息中心</a>
                                    <ul class="am-menu-sub am-collapse  ">
                                        <li class="">
                                            <a href="<?php echo u('Index/news');?>?status=1" class="" >西分会</a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo u('Index/news');?>?status=2" class="" >东分会</a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo u('Index/news');?>?status=3" class="" >北分会</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class=""><a href="html/about.html" class="" >关于我们</a></li>
                                <li class=""><a href="html/join.html" class="" >加入我们</a></li>
                                <li class=""><a href="html/contact.html" class="" >联系我们</a></li>
                                <li class="am-parent">
                                    <a href="" class="nav-icon nav-icon-globe" >Language</a>
                                    <ul class="am-menu-sub am-collapse  ">
                                        <li>
                                            <a href="#" >English</a>
                                        </li>
                                        <li class="">
                                            <a href="#" >Chinese</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-share-contain">
                                    <div class="nav-share-links">
                                        <i class="am-icon-facebook"></i>
                                        <i class="am-icon-twitter"></i>
                                        <i class="am-icon-google-plus"></i>
                                        <i class="am-icon-pinterest"></i>
                                        <i class="am-icon-instagram"></i>
                                        <i class="am-icon-linkedin"></i>
                                        <i class="am-icon-youtube-play"></i>
                                        <i class="am-icon-rss"></i>
                                    </div>
                                </li>
                                <li class=""><a href="<?php echo u('Index/login');?>" class="" >登录</a></li>
                                <li class=""><a href="<?php echo u('Index/register');?>" class="" >注册</a></li>
                            </ul>

                        </div>
                    </div>
                </nav>

            </div>
        </div>
        <div class="am-u-sm-5 am-u-end">
            <div class="m-logo">
                <a href=""><img src="/luoliwuxie/Public/Home/images/logo.png" alt=""></a>
            </div>
        </div>
    </div>
</div>


    <!--mobile header end-->
</div>
<div id="allmap" style="overflow:hidden;zoom:1;position:relative;margin:auto;margin-top:35px;width:60%;">
    <div id="map" style="height:100%;-webkit-transition: all 0.5s ease-in-out;transition: all 0.5s ease-in-out;"></div>
</div>

<div class="layout-footer">
    <div class="footer">
        <div style="background-color:#383d61" class="footer--bg"></div>
        <div class="footer--inner">
            <div class="container">
                <div class="footer_main">
                    <div class="am-g">
                        <div class="am-u-md-3 ">
                            <div class="footer_main--column">
                                <strong class="footer_main--column_title">关于我们</strong>
                                <div class="footer_about">
                                    <p class="footer_about--text">
                                        云适配(AllMobilize Inc.) 是全球领先的HTML5企业移动化解决方案供应商，由前微软美国总部IE浏览器核心研发团队成员及移动互联网行业专家在美国西雅图创立.
                                    </p>
                                    <p class="footer_about--text">
                                        云适配跨屏云也成功应用于超过30万家企业网站，包括微软、联想等世界500强企业
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="am-u-md-3 ">
                            <div class="footer_main--column">
                                <strong class="footer_main--column_title">产品中心</strong>
                                <ul class="footer_navigation">
                                    <li class="footer_navigation--item"><a href="#" class="footer_navigation--link">Enterplorer 企业浏览器</a></li>
                                    <li class="footer_navigation--item"><a href="#" class="footer_navigation--link">Xcloud 网站跨屏云</a></li>
                                    <li class="footer_navigation--item"><a href="#" class="footer_navigation--link">Amaze UI 前端开发框架</a></li>
                                    <li class="footer_navigation--item"><a href="#" class="footer_navigation--link">Amaze UI 前端开发框架</a></li>
                                    <li class="footer_navigation--item"><a href="#" class="footer_navigation--link">Amaze UI 前端开发框架</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="am-u-md-3 ">
                            <div class="footer_main--column">
                                <strong class="footer_main--column_title">技术支持</strong>
                                <ul class="footer_navigation">
                                    <li class="footer_navigation--item"><a href="#" class="footer_navigation--link">企业移动信息化白皮书</a></li>
                                    <li class="footer_navigation--item"><a href="#" class="footer_navigation--link">企业移动信息化白皮书</a></li>
                                    <li class="footer_navigation--item"><a href="#" class="footer_navigation--link">企业移动信息化白皮书</a></li>
                                    <li class="footer_navigation--item"><a href="#" class="footer_navigation--link">企业移动信息化白皮书</a></li>
                                    <li class="footer_navigation--item"><a href="#" class="footer_navigation--link">企业移动信息化白皮书</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="am-u-md-3 ">
                            <div class="footer_main--column">
                                <strong class="footer_main--column_title">联系详情</strong>
                                <ul class="footer_contact_info">
                                    <li class="footer_contact_info--item"><i class="am-icon-phone"></i><span>服务专线：400 069 0309</span></li>
                                    <li class="footer_contact_info--item"><i class="am-icon-envelope-o"></i><span>yunshipei.com</span></li>
                                    <li class="footer_contact_info--item"><i class="am-icon-map-marker"></i><span>北京市海淀区海淀大街27号天使大厦（原亿景大厦）三层</span></li>
                                    <li class="footer_contact_info--item"><i class="am-icon-clock-o"></i><span>更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    // 百度地图API功能
    map = new BMap.Map("allmap");
    map.centerAndZoom(new BMap.Point(112.424325,34.619474), 13);
    map.enableScrollWheelZoom(); // 添加滚动轴
    map.addControl(new BMap.NavigationControl()); // 添加左上角的标尺工具
    map.addControl(new BMap.NavigationControl());
    map.addControl(new BMap.ScaleControl());
    map.addControl(new BMap.OverviewMapControl());
    map.addControl(new BMap.MapTypeControl());
    map.setCurrentCity("洛阳");
    var data_info = [[112.424325,34.619474,"名称：洛阳理工学院武术协会（西分会）<br/>地址： 河南省洛阳市洛龙区学子街8号"],
        [112.439283,34.614729,"名称：洛阳理工学院武术协会（东分会）<br/>地址： 河南省洛阳市洛龙区王城大道90号"],
        [112.420266,34.655682,"名称：洛阳理工学院武术协会（北分会）<br/>地址： 河南省洛阳市涧西区九都路与珠江路交叉口"]
    ];
    var opts = {
        width : 250,     // 信息窗口宽度
        height: 80,     // 信息窗口高度
        title : "地址详情" , // 信息窗口标题
        enableMessage:true//设置允许信息窗发送短息
    };

    for(var i=0;i<data_info.length;i++){
        var marker = new BMap.Marker(new BMap.Point(data_info[i][0],data_info[i][1]));  // 创建标注
        var content = data_info[i][2];
        map.addOverlay(marker);               // 将标注添加到地图中
        addClickHandler(content,marker);
    }
    function addClickHandler(content,marker){
        marker.addEventListener("click",function(e){
                    openInfo(content,e)}
        );
    }
    function openInfo(content,e){
        var p = e.target;
        var point = new BMap.Point(p.getPosition().lng, p.getPosition().lat);
        var infoWindow = new BMap.InfoWindow(content,opts);  // 创建信息窗口对象
        map.openInfoWindow(infoWindow,point); //开启信息窗口
        document.getElementById("map").innerHTML = "信息窗口的内容是：<br />" + infoWindow.getContent();
    }

</script>
</body>
</html>
</script>