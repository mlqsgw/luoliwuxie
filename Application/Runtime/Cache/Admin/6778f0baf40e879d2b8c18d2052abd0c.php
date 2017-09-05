<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/luoliwuxie/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/luoliwuxie/Public/admin/js/jquery.js"></script>

<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson li").click(function(){
		$(".menuson li.active").removeClass("active")
		$(this).addClass("active");
	});
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('ul').slideUp();
		if($ul.is(':visible')){
			$(this).next('ul').slideUp();
		}else{
			$(this).next('ul').slideDown();
		}
	});
})	
</script>

</head>
<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span>通讯录</div>
    
    <dl class="leftmenu">
        
    <dd>
    <div class="title">
    <span><img src="/luoliwuxie/Public/admin/images/leftico01.png" /></span>基础设置
    </div>
	<ul class="menuson">
    <li class="active"><cite></cite>
    <a href="/luoliwuxie/Admin/Base/base_mes" target="rightFrame">站点统计</a><i></i></li>
    <li><cite></cite><a href="/luoliwuxie/Admin/Base/web_set" target="rightFrame">网站设置</a><i></i></li>
    </ul>    
    </dd>
    
    <dd>
    <div class="title">
    <span><img src="/luoliwuxie/Public/admin/images/leftico02.png" /></span>管理员管理
    </div>
    <ul class="menuson">
    <li><cite></cite><a href="/luoliwuxie/Admin/manage/manage_list" target="rightFrame">管理员列表</a><i></i></li>
    </ul>
    </dd> 

    <dd><div class="title"><span><img src="/luoliwuxie/Public/admin/images/leftico03.png" /></span>会员管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="/luoliwuxie/Admin/Users/user_list" target="rightFrame">会员列表</a><i></i></li>
    </ul>    
    </dd>

    <dd><div class="title"><span><img src="/luoliwuxie/Public/admin/images/leftico03.png" /></span>信息管理</div>
        <ul class="menuson">
            <li><cite></cite><a href="<?php echo u('Category/cate_list');?>" target="rightFrame">分类列表</a><i></i></li>
            <li><cite></cite><a href="/luoliwuxie/Admin/Category/content_list" target="rightFrame">信息列表</a><i></i></li>
        </ul>
    </dd>

    <dd>
    <div class="title"><span><img src="/luoliwuxie/Public/admin/images/leftico04.png" /></span>留言反馈</div>
        <ul class="menuson">
           <li><cite></cite><a href="/luoliwuxie/Admin/Message/message_list" target="rightFrame">留言管理</a><i></i></li>
        </ul>
    </dd>  

   <dd>
   <div class="title"><span><img src="/luoliwuxie/Public/admin/images/leftico04.png" /></span>友情链接</div>
    <ul class="menuson">
        <li><cite></cite><a href="/luoliwuxie/Admin/Link/link_list"  target="rightFrame">链接列表</a><i></i></li>
    </ul>
    </dd> 
    </dl>
    
</body>
</html>