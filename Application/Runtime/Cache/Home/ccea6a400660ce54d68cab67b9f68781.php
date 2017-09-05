<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="/luoliwuxie/Public/Home/css/amazeui.css" />
  <link rel="stylesheet" href="/luoliwuxie/Public/Home/css/other.min.css" />

  <script src="/luoliwuxie/Public/Home/js/jquery-2.1.0.js" charset="utf-8"></script>
  <script language="JavaScript" src="/luoliwuxie/Public/home/js/sweetalert.min.js"></script>
  <link rel="stylesheet" href="/luoliwuxie/Public/home/css/sweetalert.css">
    <style>
        .sweet-alert button{margin:65px 5px 0 5px;}
    </style>
</head>
<body class="login-container">
  <div class="login-box">
    <div class="logo-img">
      <img src="/luoliwuxie/Public/Home/images/logo2_03.png" alt="" />
    </div>
    <form id="data-form" class="am-form" data-am-validator>
      <div class="am-form-group">
        <label for="doc-vld-name-2"><i class="am-icon-user"></i></label>
        <input type="text" name="account" id="doc-vld-name-2" placeholder="输入登陆帐号" required/>
      </div>

      <div class="am-form-group">
        <label for="doc-vld-email-2"><i class="am-icon-key"></i></label>
        <input type="password" name="password" placeholder="输入密码" required/>
      </div>
      <span class="am-btn am-btn-secondary" id="submit" style="padding-top:14px;" >登录</span>
    </form>
  </div>
  <script>
      $("#submit").click(function(){
          $.ajax({
              type : "POST",
              url : "<?php echo u('Index/do_login');?>",
              data : $("#data-form").serializeArray(),
              dataType : 'json',
              success : function(data){
                  if (data['status']){
                     swal({
                         title : data["message"],
                         text : "",
                         type : "success",
                     },function(){
                         location.href = "<?php echo u('Index/index');?>";
                     });
                  } else {
                      swal(data["message"],"","error");
                  }
              }
          });
      });
  </script>
</body>
</html>