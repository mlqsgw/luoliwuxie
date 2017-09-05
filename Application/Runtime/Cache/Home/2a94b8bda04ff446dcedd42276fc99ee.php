<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>企业网站模板</title>
  <link rel="stylesheet" href="/luoliwuxie/Public/Home/css/amazeui.css" />
  <link rel="stylesheet" href="/luoliwuxie/Public/Home/css/common.min.css" />
  <link rel="stylesheet" href="/luoliwuxie/Public/Home/css/index.min.css" />
  <link rel="stylesheet" href="/luoliwuxie/Public/Home/css/style.css">
  <script language="JavaScript" src="/luoliwuxie/Public/home/js/jquery-2.1.0.js"></script>
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

    <!--===========layout-container================-->
    <div class="layout-container">
      <div class="index-page">
        <div data-am-widget="tabs" class="am-tabs am-tabs-default">
          <div class="am-tabs-bd">
            <div data-tab-panel-0 class="am-tab-panel am-active">
              <div class="index-banner" style="background: url('/luoliwuxie/Uploads/<?php echo ($top_images["images"]); ?>');background-size:100%;">
                <div class="index-mask">
                  <div class="container">
                    <div class="am-g">
                      <div class="am-u-md-10 am-u-sm-centered">
                        <!--<h1 class="slide_simple&#45;&#45;title">企业移动化，首选云适配</h1>-->
                        <!--<p class="slide_simple&#45;&#45;text am-text-left">-->
												  <!--全球领先的HTML5企业移动化解决方案供应商，安全高效的帮助您的企业移动化。云适配企业浏览器Enterploer,让企业安全迈进移动办公时代！-->
											  <!--</p>-->
                        <!--<div class="slide_simple&#45;&#45;buttons">-->
                          <!--<button type="button" class="am-btn am-btn-danger">了解更多</button>-->
                        <!--</div>-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div data-tab-panel-1 class="am-tab-panel ">
              <div class="index-banner" style="background: url('/luoliwuxie/Uploads/<?php echo ($east_images["images"]); ?>');background-size:100%;">
                <div class="index-mask">
                  <div class="container">
                    <div class="am-g">
                      <div class="am-u-md-10 am-u-sm-centered">
                        <!--<h1 class="slide_simple&#45;&#45;title">企业移动化，首选云适配</h1>-->
                        <!--<p class="slide_simple&#45;&#45;text am-text-left">-->
												  <!--全球领先的HTML5企业移动化解决方案供应商，安全高效的帮助您的企业移动化。云适配企业浏览器Enterploer,让企业安全迈进移动办公时代！-->
											  <!--</p>-->
                        <!--<div class="slide_simple&#45;&#45;buttons">-->
  												<!--<button type="button" class="am-btn am-btn-danger">了解更多</button>-->
											  <!--</div>-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div data-tab-panel-2 class="am-tab-panel ">
              <div class="index-banner" style="background: url('/luoliwuxie/Uploads/<?php echo ($west_images["images"]); ?>');background-size:100%;">
                <div class="index-mask">
                  <div class="container">
                    <div class="am-g">
                      <div class="am-u-md-10 am-u-sm-centered">
                        <!--<h1 class="slide_simple&#45;&#45;title">企业移动化，首选云适配</h1>-->
                        <!--<p class="slide_simple&#45;&#45;text am-text-left">-->
												  <!--全球领先的HTML5企业移动化解决方案供应商，安全高效的帮助您的企业移动化。云适配企业浏览器Enterploer,让企业安全迈进移动办公时代！-->
											  <!--</p>-->
                        <!--<div class="slide_simple&#45;&#45;buttons">-->
  												<!--<button type="button" class="am-btn am-btn-danger">了解更多</button>-->
											  <!--</div>-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div data-tab-panel-3 class="am-tab-panel ">
              <div class="index-banner" style="background: url('/luoliwuxie/Uploads/<?php echo ($north_images["images"]); ?>');background-size:100%;">
                <div class="index-mask">
                  <div class="container">
                    <div class="am-g">
                      <div class="am-u-md-10 am-u-sm-centered">
                        <!--<h1 class="slide_simple&#45;&#45;title">企业移动化，首选云适配</h1>-->
                        <!--<p class="slide_simple&#45;&#45;text am-text-left">-->
												  <!--全球领先的HTML5企业移动化解决方案供应商，安全高效的帮助您的企业移动化。云适配企业浏览器Enterploer,让企业安全迈进移动办公时代！-->
											  <!--</p>-->
                        <!--<div class="slide_simple&#45;&#45;buttons">-->
  												<!--<button type="button" class="am-btn am-btn-danger">了解更多</button>-->
											  <!--</div>-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <ul class="am-tabs-nav am-cf index-tab">
            <li class="am-active">
              <a href="[data-tab-panel-0] am-g">
                <div class="am-u-md-3 am-u-sm-3 am-padding-right-0">
                  <i class="am-icon-cog"></i>
                </div>
                <div class="school-item-right am-u-md-9 am-u-sm-9 am-text-left">
                  <strong class="promo_slider_nav--item_title">总区域</strong>
                  <p class="promo_slider_nav--item_description">Enterplorer 企业浏览器</p>
                </div>
              </a>
            </li>
            <li class="a">
              <a href="[data-tab-panel-1] am-g">
                <div class="am-u-md-3 am-u-sm-3 am-padding-right-0">
                  <i class="am-icon-lightbulb-o"></i>
                </div>
                <div class="school-item-right am-u-md-9 am-u-sm-9 am-text-left">
                  <strong class="promo_slider_nav--item_title">区域1</strong>
                  <p class="promo_slider_nav--item_description">Xcloud 网站跨屏云</p>
                </div>
              </a>
            </li>
            <li class="">
              <a href="[data-tab-panel-2] am-g">
                <div class="am-u-md-3 am-u-sm-3 am-padding-right-0">
                  <i class="am-icon-line-chart"></i>
                </div>
                <div class="school-item-right am-u-md-9 am-u-sm-9 am-text-left">
                  <strong class="promo_slider_nav--item_title">区域2</strong>
                  <p class="promo_slider_nav--item_description">Amaze UI 前端开发框架</p>
                </div>
              </a>
            </li>
            <li class="">
              <a href="[data-tab-panel-3] am-g">
                <div class="am-u-md-3 am-u-sm-3 am-padding-right-0">
                  <i class="am-icon-hourglass-end"></i>
                </div>
                <div class="school-item-right am-u-md-9 am-u-sm-9 am-text-left">
                  <strong class="promo_slider_nav--item_title">区域3</strong>
                  <p class="promo_slider_nav--item_description">Lorem ipsum asmo dolor</p>
                </div>
              </a>
            </li>
          </ul>
        </div>

      </div>
    </div>


    <div class="section">
      <div class="container">
        <div class="section--header">
					<h2 class="section--title">核心优势</h2>
					<p class="section--description">
						全球领先HTML5企业移动化解决方案供应商，由前微软美国总部IE浏览器核心研发团队成员及移动互联网行业专家在美国西雅图创立
						<br>获得了微软创投的扶持以及晨兴资本、IDG资本、天创资本等国际顶级风投机构的投资。
					</p>
				</div>

        <!--index-container start-->
        <!--跑马灯图片-->
        <div class="index-container">
          <div class="am-g">
          <!--<marquee behavior="scroll" direction="left" width:70%>-->
              <?php if(is_array($image_data)): $i = 0; $__LIST__ = $image_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="am-u-md-3">
                      <div class="features_item">
                          <img src="/luoliwuxie/Uploads/<?php echo ($vo["images"]); ?>" style="width: 100%;" alt="">
                          <h3 class="features_item--title"><?php echo mb_strimwidth($vo['news_title'],0,40,'***')?></h3>
                          <p class="features_item--text">
                              <?php echo ($vo["news_content"]); ?>
                          </p>
                      </div>
                  </div><?php endforeach; endif; else: echo "" ;endif; ?>
          <!--</marquee>-->

          </div>

          <div class="index-more">
            <button type="button" class="am-btn am-btn-secondary">MORE&nbsp;&nbsp;>></button>
          </div>
        </div>
        <!--index-container end-->
      </div>
    </div>

  </div>

  <!--promo_detailed start-->
  <div class="promo_detailed">
    <div class="promo_detailed-container" >
      <div class="container">
        <div class="am-g">
          <div class="am-u-md-6">
            <ul class="promo_detailed--list">
              <li class="promo_detailed--list_item">
                <span class="promo_detailed--list_item_icon">
                  <i class="am-icon-diamond"></i>
                </span>
                <dl>
                  <dt>多层次的用户管理功能</dt>
                  <dd>
                    支持用户的添加和导入，与AD可以进行紧密的整合，实时同步最新的用户信息，从而方便对用户进行管理。
                  </dd>
                </dl>
              </li>
              <li class="promo_detailed--list_item">
                <span class="promo_detailed--list_item_icon">
                  <i class="am-icon-dollar" style="margin-left: 15px;"></i>
                </span>
                <dl>
                  <dt>丰富的日志报表系统</dt>
                  <dd>
                    提供实时监控平台，日志和报告系统，帮助管理员对系统的整体情况有全面的了解。
                  </dd>
                </dl>
              </li>
              <li class="promo_detailed--list_item">
                <span class="promo_detailed--list_item_icon">
                  <i class="am-icon-bank" style="margin-left: 10px;"></i>
                </span>
                <dl>
                  <dt>丰富的应用程序管理</dt>
                  <dd>
                    支持在线应用、适配应用、本地应用等多种应用类型。使用户可以最便捷的获取企业的各种应用。
                  </dd>
                </dl>
              </li>
            </ul>
          </div>

          <div class="am-u-md-6">
            <div class="promo_detailed--cta">
              <div class="promo_detailed--cta_wrap">
                <div class="promo_detailed--cta_text">
									提供设备的远程锁定，擦除等功能。在设备出现遗失的情况下可以最大程度的保护企业的信息不被泄露。
								</div>
                <div class="promo_detailed--cta_footer">
                  <button type="button" class="am-btn am-btn-danger">MORE&nbsp;&nbsp;>></button>
                </div>
              </div>
              <div class="promo_detailed-img am-show-sm-only" style="background-image: url('/luoliwuxie/Public/Home/images/index/promo_detailed_bg.jpg');"></div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="promo_detailed-img am-hide-sm-only" style="background-image: url('/luoliwuxie/Public/Home/images/index/promo_detailed_bg.jpg');"></div>
  </div>
  <!--promo_detailed end-->

  <div class="section"  style="border-bottom: 1px solid #e9e9e9;">
    <div class="container">
      <div class="section--header">
        <h2 class="section--title">我们的服务</h2>
        <p class="section--description">
          全球领先HTML5企业移动化解决方案供应商，由前微软美国总部IE浏览器核心研发团队成员及移动互联网行业专家在美国西雅图创立
          <br>获得了微软创投的扶持以及晨兴资本、IDG资本、天创资本等国际顶级风投机构的投资。
        </p>
      </div>

      <!--index-container start-->
      <div class="index-container">
        <div class="am-g">
          <div class="am-u-md-3">
            <div class="service_item">
              <i class="service_item--icon am-icon-diamond"></i>
              <h3 class="service_item--title">多页面工作</h3>
              <div class="service_item--text">
								<p>标签栏可切换，不必为了新内容而被迫跳转界面，多项工作内容并行处理</p>
							</div>
              <footer class="service_item--footer"><a href="#" class="link -blue_light">Learn More>></a></footer>
            </div>
          </div>

          <div class="am-u-md-3">
            <div class="service_item">
              <i class="service_item--icon am-icon-user"></i>
              <h3 class="service_item--title">统一入口</h3>
              <div class="service_item--text">
								<p>集成企业内网所有资源，OA、CRM、ERP、邮件系统，单点登录，无需重复输入密码</p>
							</div>
              <footer class="service_item--footer"><a href="#" class="link -blue_light">Learn More>></a></footer>
            </div>
          </div>

          <div class="am-u-md-3">
            <div class="service_item">
              <i class="service_item--icon am-icon-umbrella"></i>
              <h3 class="service_item--title">一键直达</h3>
              <div class="service_item--text">
								<p>办公流程太多，搜索框输入（或语音输入），可以快速找到核心内容</p>
							</div>
              <footer class="service_item--footer"><a href="#" class="link -blue_light">Learn More>></a></footer>
            </div>
          </div>

          <div class="am-u-md-3">
            <div class="service_item">
              <i class="service_item--icon am-icon-briefcase"></i>
              <h3 class="service_item--title">语音助手</h3>
              <div class="service_item--text">
								<p>不方便打字时，可以直接用语音输入想要的内容，使您的双手得到解放</p>
							</div>
              <footer class="service_item--footer"><a href="#" class="link -blue_light">Learn More>></a></footer>
            </div>
          </div>
        </div>
      </div>
      <!--index-container end-->
    </div>
  </div>

  <div class="section promo_banner-container">
    <!--index-container start-->
    <div class="promo_banner-box">
      <div class="container">
        <h2 class="promo_banner--title">期待您的加入</h2>
        <p class="promo_banner--text">
					我们成立了三年，正用自己的技术力量一步一步改变世界。
					<br> 我们开创了中国首个开源HTML5跨屏前端框架、可见即可得的IDE、无障碍网页我们是全球独一无二的
					<br> 云适配技术，我们的目标是打造极致的网页体验。
        <footer class="promo_banner--footer">
					<button type="button" class="am-btn am-btn-secondary">MORE>></button>
				</footer>
      </div>
    </div>
    <!--index-container end-->
  </div>



  <!--customer-logo start-->
    <div class="customer-logo">
      <div class="container">
        <div class="am-g">
          <div class="am-u-md-2 am-u-sm-4 customer-box">
            <a href="#">
              <img class="normal-logo" src="/luoliwuxie/Public/Home/images/index/customer_logo_Microsoft.png" alt="" />
              <img class="am-active"  alt=""src="/luoliwuxie/Public/Home/images/index/customer_logo_Microsoft_active.png" alt="" />
            </a>
          </div>
          <div class="am-u-md-2 am-u-sm-4 customer-box">
            <a href="#">
              <img class="normal-logo" src="/luoliwuxie/Public/Home/images/index/customer_logo_qhdx.png" alt="" />
              <img class="am-active" src="/luoliwuxie/Public/Home/images/index/customer_logo_qhdx_active.png" alt="" />
            </a>
          </div>
          <div class="am-u-md-2 am-u-sm-4 customer-box">
            <a href="#">
              <img class="normal-logo" src="/luoliwuxie/Public/Home/images/index/customer_logo_gmw.png" alt="" />
              <img class="am-active" src="/luoliwuxie/Public/Home/images/index/customer_logo_gmw_active.png" alt="" />
            </a>
          </div>
          <div class="am-u-md-2 am-u-sm-4 customer-box">
            <a href="#">
              <img class="normal-logo" src="/luoliwuxie/Public/Home/images/index/customer_logo_gov.png" alt="" />
              <img class="am-active" src="/luoliwuxie/Public/Home/images/index/customer_logo_gov_active.png" alt="" />
            </a>
          </div>
          <div class="am-u-md-2 am-u-sm-4 customer-box">
            <a href="#">
              <img class="normal-logo" src="/luoliwuxie/Public/Home/images/index/customer_logo_jl.png" alt="" />
              <img class="am-active" src="/luoliwuxie/Public/Home/images/index/customer_logo_jl_active.png" alt="" />
            </a>
          </div>
          <div class="am-u-md-2 am-u-sm-4 customer-box">
            <a href="#">
              <img class="normal-logo" src="/luoliwuxie/Public/Home/images/index/customer_logo_hx.png" alt="" />
              <img class="am-active" src="/luoliwuxie/Public/Home/images/index/customer_logo_hx_active.png" alt="" />
            </a>
          </div>
        </div>
      </div>
    </div>
  <!--customer-logo end-->


  <div class="section" style="margin-top:0px;background-image: url('/luoliwuxie/Public/Home/images/pattern-light.png');">
    <div class="container">
      <!--index-container start-->
      <div class="index-container">
        <div class="am-g">
          <div class="am-u-md-4">
            <div class="contact_card">
							<i style="color:#59bcdb" class="contact_card--icon am-icon-phone"></i>
							<strong class="contact_card--title">Contact Us</strong>
							<p class="contact_card--text">Feel free to call us on <br> <strong>0 (855) 233-5385</strong> <br> Monday - Friday, 8am - 7pm</p>
              <button type="button" class="am-btn am-btn-secondary">Order a Call Back</button>
						</div>
          </div>
          <div class="am-u-md-4">
            <div class="contact_card">
							<i style="color:#59bcdb" class="contact_card--icon am-icon-envelope-o"></i>
							<strong class="contact_card--title">Our Email</strong>
							<p class="contact_card--text">Drop us a line anytime at <br> <strong><a href="mailto:info@financed.com">info@financed.com</a>,</strong> <br> and we’ll get back soon.</p>
              <button type="button" class="am-btn am-btn-secondary">Start Writing</button>
						</div>
          </div>
          <div class="am-u-md-4">
            <div class="contact_card">
							<i style="color:#59bcdb" class="contact_card--icon am-icon-map-marker"></i>
							<strong class="contact_card--title">Our Address</strong>
							<p class="contact_card--text">Come visit us at <br> <strong>Stock Building, New York,</strong> <br> NY 93459</p>
              <button type="button" class="am-btn am-btn-secondary">See the Map</button>
						</div>
          </div>
        </div>
      </div>
      <!--index-container end-->
    </div>
  </div>

  <!--===========layout-footer================-->
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

  <script src="/luoliwuxie/Public/Home/js/jquery-2.1.0.js" charset="utf-8"></script>
  <script src="/luoliwuxie/Public/Home/js/amazeui.js" charset="utf-8"></script>
  <script src="/luoliwuxie/Public/Home/js/common.js" charset="utf-8"></script>

  <script src="/luoliwuxie/Public/Home/js/html5shiv.min.js"></script>
  <script src="/luoliwuxie/Public/Home/js/jquery.min.js"></script>
  <script type="text/javascript" src="/luoliwuxie/Public/Home/js/marquee.js"></script>

  <script type="text/javascript">
      document.querySelector("#hovertreemarquee div:first-of-type span");
      document.querySelector(".am-g");
  </script>
</body>

</html>