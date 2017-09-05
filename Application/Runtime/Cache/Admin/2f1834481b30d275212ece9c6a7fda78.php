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

<script type="text/javascript">
    $(document).ready(function(e) {
        $(".select1").uedSelect({
        width : 345
      });

    });
</script>

<style>
    .hidden {display:none;}
    .reset_div {height: 100%;width:100%;position: fixed;top:0;z-index:1000;background-color:rgba(0,0,0,0.2);}
    .look_div_one {width:41%;height:60%;position:fixed;top:20%;left:27%;z-index:1001;background-color:#ffffff;}
    .cancle_div {width:60px;height:30px;margin-left:45%;margin-top:5%;}
    .btn_reset {width:100%;height:100%;padding-left:45%;background-color:#6767ca;color:#fff;margin-top:5%;margin-left:-21px;}
    .look_content {margin:auto;width:80%;height:50%;background-color: #cccccc;}
    .look_content span {margin:20px 0px 0px 10px;}
    .look_content input {border:1px solid #6767ca;}
    .cancle_div_remove {width:50px;background-color:#6767ca;float:right;color:#fff;}
</style>

</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="/luoliwuxie/Admin/Index/main" target='_parent'>首页</a></li>
    <li><a href="javascript:;">会员管理</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    <div class="itab">
  	<ul> 
  	 <li><a href="#tab2" class="selected">会员列表</a></li> 
     <li><a href="#tab1" >添加会员</a></li> 
    
  	</ul>
    </div> 
    

    <!--管理员添加-->
  <div id="tab1" class="tabson">
    <div class="formtext">
        Hi，<b>超级管理员</b>，欢迎您使用管理员管理！
    </div>
    <form method='post' action="<?php echo u('Users/user_add');?>">
    <ul class="forminfo">
   
    <li>
      <label>用户名<b>*</b></label>
      <input name="account" type="text" class="dfinput"  style="width:518px;"/><i>此为登录名，一经填写不可更改</i>
    </li>
    <li>
      <label>密码<b>*</b></label>
      <input name="password" type="text" class="dfinput"  style="width:518px;"  />
    </li>
    <li>
      <label>电话<b>*</b></label>
      <input name="phone" type="text" class="dfinput"  style="width:518px;" />
    </li>
    <li>
      <label>邮箱<b>*</b></label>
      <input name="email" type="text" class="dfinput" style="width:518px;"/><i>请认真填写邮箱，可用于密码找回</i>
    </li>
    <li><label>&nbsp;</label>
    <input type="submit" class="btn" value="马上发布"/></li>
    </ul>
    </form>
    </div> 


    <!--会员列表-->
  	<div id="tab2" class="tabson">
    <table class="tablelist">
    	<thead>
    	<tr>
        <th>编号</th>
        <th>帐号</th>
        <th>电话</th>
        <th>邮箱</th>
        <th>添加时间</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo['id']); ?></td>
                <td><?php echo ($vo['account']); ?></td>
                <td><?php echo ($vo['phone']); ?></td>
                <td><?php echo ($vo['email']); ?></td>
                <td><?php echo date('Y-m-d H:i:s',$vo['create_time']);?></td>
                <td>
                    <a href="<?php echo u('Users/user_edit');?>?id=<?php echo ($vo["id"]); ?>" class="tablelink">编辑</a>
                    <a style="cursor: pointer" class="delete_class" data-id="<?php echo ($vo["id"]); ?>" onclick="return confirm('确定删除吗？')"> 删除</a>
                    <a style="cursor: pointer" class="reset_class" data-id="<?php echo ($vo["id"]); ?>">密码重置</a>
                </td>
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

    <!--弹出层-->
    <div class="reset_div hidden">
        <div class="look_div_one">
            <div class="cancle_div_remove" style="cursor: pointer;">
                <span id="div_remove" style="margin-left:11px;">关闭</span>
            </div>
            <div class="look_content">
                <li style="margin-top:20px;margin-left:21%;padding-top:10px;">
                    <label>用户名<b>*</b></label>
                    <input style="height:23px;" name="account" type="text" id="reset_account" value=""  readonly />
                </li>
                <li style="margin-top:20px;margin-left:21%;">
                    <label>密&nbsp;&nbsp;&nbsp;码<b>*</b></label>
                    <input style="height:23px;" type="password" id="reset_password" value="" />
                </li>
            </div>
            <div class="cancle_div">
                <input class="btn_reset" style="cursor: pointer;" value="提交"/>
            </div>
        </div>
    </div>

	</div> 
 

    </div>



    <script type="text/javascript">
      $("#usual1 ul").idTabs();
    </script>

    <script type="text/javascript">
      $('.tablelist tbody tr:odd').addClass('odd');
    </script>

    <script>
        $(".delete_class").click(function(){
            var id = $(this).attr("data-id");
            $.ajax({
                type : "POST",
                url : "<?php echo u('Users/user_delete');?>",
                data : {id : id},
                dataType : 'json',
                success : function(data){
                    if (data) {
                        alert("删除成功");
                        location.href = "<?php echo u('Users/user_list');?>";
                    } else {
                        alert("删除失败");
                    }
                }
            });
        });

        $(".reset_class").click(function(){
            var id = $(this).attr("data-id");
            $.ajax({
                type : "POST",
                url : "<?php echo u('Users/get_user');?>",
                data : {id:id},
                dataType : 'json',
                success : function(data){
                    if (data) {
                        $("#reset_account").val(data['account']);
                        $(".reset_div").removeClass("hidden");
                    } else {
                        alert("该数据不存在");
                    }
                }
            });

        });

        $(".btn_reset").click(function(){
            var id = $(".reset_class").attr("data-id");
            var password = $("#reset_password").val();

            $.ajax({
                type : "POST",
                url : "<?php echo u('Users/password_reset');?>",
                data : {id : id, password : password},
                dataType : 'json',
                success : function(data){
                    if (data) {
                        alert("密码修改成功");
                        $(".reset_div").addClass("hidden");
                        location.reload();
                    } else {
                        alert("密码修改失败");
                    }
                }
            });
        });

        $("#div_remove").click(function(){
            $(".reset_div").addClass("hidden");
        });
    </script>
</body>

</html>