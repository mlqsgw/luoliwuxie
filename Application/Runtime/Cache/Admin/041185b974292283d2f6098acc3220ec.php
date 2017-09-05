<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录后台管理系统</title>
<link href="/luoliwuxie/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/luoliwuxie/Public/admin/js/jquery.js"></script>
<script language="JavaScript" src="/luoliwuxie/Public/admin/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="/luoliwuxie/Public/admin/css/sweetalert.css">
<script src="/luoliwuxie/Public/admin/js/cloud.js" type="text/javascript"></script>

<script language="javascript">
	$(function(){
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
	$(window).resize(function(){  
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    })  
});  
</script> 

</head>

<body onload="ready()" style="background-color:#1c77ac; background-image:url(/luoliwuxie/Public/admin/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">
    <div id="mainBody">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
    </div>  


<div class="logintop">    
    <span>欢迎登录后台管理界面平台</span>    
    <ul>
    <li><a href="#">回首页</a></li>
    <li><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    </ul>    
</div>
    
<div class="loginbody">  
<span class="systemlogo"></span>  

<div class="loginbox">
    <form id="data-form" >
        <ul>
            <li>
            <input  type="text" class="loginuser"  name="account" onclick="JavaScript:this.value=''"/></li>
            <li><input  type="password" class="loginpwd" name="password" onclick="JavaScript:this.value=''"/></li>
            <li>
                <input type="button" class="loginbtn" value="登录" />
            <label>
                <input name="" type="checkbox" value="" checked="checked" />记住密码</label>
            <label><a href="#">忘记密码？</a></label></li>
        </ul>
    </form>
</div>


</div>
<div class="loginbm"><a href="javacript:;"></a> </div>
    <script>
        $(".loginbtn").click(function(){
            $.ajax({
                type : "POST",
                url : "<?php echo u('Index/do_login');?>",
                data : $("#data-form").serializeArray(),
                dataType : 'json',
                success : function(data){
                    if (data['status']){
                        window.location.href = "<?php echo u('Index/index');?>";
                    } else {
                        swal(data["message"],"","error");
                    }
                }
            });
        });

        function ready(){
            if(top.location!=self.location)
            {
                top.location=self.location;
            }
        }
    </script>
    
</body>

</html>