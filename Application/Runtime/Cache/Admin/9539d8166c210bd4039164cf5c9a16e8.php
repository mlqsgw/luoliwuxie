<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/luoliwuxie/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/luoliwuxie/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/luoliwuxie/Public/admin/js/jquery.js"></script>
<script type="text/javascript" src="/luoliwuxie/Public/admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/luoliwuxie/Public/admin/js/select-ui.min.js"></script>
<script language="JavaScript" src="/luoliwuxie/Public/admin/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="/luoliwuxie/Public/admin/css/sweetalert.css">

<style>
    .dfinput {width:40%;}
</style>

<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
    width : 345       
  });
  
});
</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="/luoliwuxie/Admin/Index/main">首页</a></li>
    <li><a href="javascript:;">管理员管理</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    <div class="itab">
  	<ul> 
  	 <li><a href="#tab2" class="selected">管理员列表</a></li> 
     <li><a href="#tab1" >添加管理员</a></li> 
    
  	</ul>
    </div> 
    

    <!--管理员添加-->
  <div id="tab1" class="tabson">
    <div class="formtext">
        Hi，<b>超级管理员</b>，欢迎您使用管理员管理！
    </div>
    <form method='post' action="<?php echo u('Manage/manage_add');?>">
    <ul class="forminfo">
    <li>
      <label>昵称<b>*</b></label>
      <input name="name" type="text" class="dfinput"/>
    </li>
    <li>
        <label>帐号<b>*</b></label>
        <input name="account" type="text" class="dfinput"/><i>此为登录帐号，一经填写不可更改</i>
    </li>
    <li>
      <label>密码<b>*</b></label>
      <input name="password" type="password" class="dfinput"/><i>不能小于6位的数字字母组合</i>
    </li>
    
    <li>
      <label>邮箱<b>*</b></label>
      <input name="email" type="text" class="dfinput"/><i>请认真填写邮箱，可用于密码找回</i>
    </li>
    <li><label>&nbsp;</label>
    <input type="submit" class="btn" value="提交"/></li>
    </ul>
    </form>
    </div> 


    <!--管理员列表-->
  	<div id="tab2" class="tabson">
    <table class="tablelist">
    	<thead>
    	<tr>
        <th>编号</th>
        <th>用户名</th>
        <th>帐号</th>
        <th>邮箱</th>
        <th>添加时间</th>
        <?php if(!empty($user_data['manage_status'])): ?><th>操作</th><?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($manage_data)): $i = 0; $__LIST__ = $manage_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td><?php echo ($vo["account"]); ?></td>
                <td><?php echo ($vo["email"]); ?></td>
                <td><?php echo date('Y-m-d H:i:s',$vo['creat_time']);?></td>
                <?php if(!empty($user_data['manage_status'])): ?><td>
                        <a href="<?php echo u('Manage/manage_edit');?>?id=<?php echo ($vo['id']); ?>" class="tablelink">编辑</a>
                        <a class="delete_class" data-id = "<?php echo ($vo["id"]); ?>" style="cursor: pointer;" onclick="return confirm('确定删除吗？')"> 删除</a>
                    </td><?php endif; ?>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div class="pagin">
        <div class="message">共<i class="blue"> <?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($p); ?>&nbsp;</i>页</div>
            <ul class="paginList">
                <li class="paginItem"> <?php echo ($page); ?></li>
            </ul>
        </div>
    </div>



    </div>  
       
	</div> 
 

    </div>



  <script type="text/javascript"> 
      $("#usual1 ul").idTabs();

      $(".delete_class").click(function(){
          var id = $(this).attr("data-id");
          $.ajax({
              type : "POST",
              url : "<?php echo u('Manage/manage_delete');?>",
              data : {id : id},
              dataType : 'json',
              success : function(data){
                  if (data["status"]) {
                      swal(data["message"],"","success");
                      location.reload();
                  } else {
                      swal(data["message"],"","error");
                  }
              }
          });
      });
  </script>

  <script type="text/javascript">
     $('.tablelist tbody tr:odd').addClass('odd');
  </script>
</body>

</html>