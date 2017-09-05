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
        .hidden {display: none;}
        .look_div {height: 100%;width:100%;position: fixed;top:0;z-index:1000;background-color:rgba(0,0,0,0.2);}
        .look_div_one {width:64%;height:65%;position:fixed;top:20%;left:16%;z-index:1001;background-color:#ffffff;}
        .cancle_div {width:60px;height:30px;background-color:#6767ca;margin-left:45%;margin-top:5%;}
        .cancle-button {width:100%;height:100%;background-color:#6767ca;color:#fff;margin-top:5%;}
        .look_content {margin:auto;width:80%;background-color: #cccccc;}
        .look_content span {margin:20px 0px 0px 10px;}
        .look_content input {border:1px solid #6767ca;}
        /*#content_title {width:100px;}*/
        .button_see {width:56px;height:24px;cursor:pointer;}
        .button_edit {width:56px;height:24px;cursor:pointer;}
        td {border-bottom:1px solid rgb(208, 222, 229);}
        #content_four {margin-left:15%;margin-top:-2%;width:80%;}
        #content_three {margin-left:3%;}
        #content_two {margin-left:3%;}
        #content_one {margin-left:7%;}

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
        <li><a href="javascript:;">栏目管理</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div class="itab">
            <ul>
                <li><a href="#tab2" class="selected">分类列表</a></li>
                <li><a href="#tab1" >添加新分类</a></li>
            </ul>
        </div>


        <!--栏目添加-->
        <div id="tab1" class="tabson">
            <div class="formtext">
                Hi，<b>超级管理员</b>，欢迎您使用分类管理！
            </div>
            <form id="data-form">
                <ul class="forminfo">
                    <li>
                        <label>所属分类<b>*</b></label>
                        <div class="vocation">
                            <select class="select1" name='pid'>
                                <option value="0">一级分类</option>
                                <?php if(is_array($data_cate)): $i = 0; $__LIST__ = $data_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["cate_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </li>

                    <li>
                        <label>分类名称<b>*</b></label>
                        <input name="cate_name" type="text" class="dfinput"  style="width:345px;"/>
                    </li>

                    <li>
                        <label>分类说明<b>*</b></label>
                        <textarea name="cate_content" cols="" rows="" class="textinput"></textarea>
                    </li>


                    <li><label>&nbsp;</label>
                        <input type="button" class="btn" value="提交"/>
                    </li>

                </ul>
            </form>
        </div>

        <!--栏目列表-->
        <div id="tab2" class="tabson">
            <table class="tablelist">
                <thead>
                <tr>
                    <th style="width:6%;padding-left:2%;">编号</th>
                    <th style="width:40%;padding-left: 26%;">分类名称</th>
                    <th style="width:10%;padding-left: 2%;">导航栏是否显示</th>
                    <th style="width:10%;padding-left: 5%;">操作</th>
                </tr>
                </thead>
                <?php if(is_array($data_cate_all)): $i = 0; $__LIST__ = $data_cate_all;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tbody>
                        <td style="padding-left: 2.5%;"><?php echo ($vo["id"]); ?></td>
                        <td style="padding-left: 24%;"><?php echo ($vo["cate_name"]); ?></td>
                        <td>
                            <?php if(empty($vo["is_show"])): ?><span style="width:54%;height:31px;padding-left: 8%;margin:auto;color:#ffffff;background-color:#3eafe0;cursor:pointer;" class="is_show" data_id="<?php echo ($vo["id"]); ?>" type_id="1">点击显示</span>
                            <?php else: ?>
                                <span style="width:54%;height:31px;padding-left: 8%;margin:auto;color:#ffffff;background-color:#3eafe0;cursor:pointer;" class="is_show" data_id="<?php echo ($vo["id"]); ?>"  type_id="0">点击隐藏</span><?php endif; ?>
                        </td>
                        <td style="padding-left:2%;"><button class="button_see" data-id="<?php echo ($vo["id"]); ?>">查看</button> <button class="button_edit" data-id="<?php echo ($vo["id"]); ?>">编辑</button></td>
                    </tbody><?php endforeach; endif; else: echo "" ;endif; ?>
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

<!--弹出层-->
<div class="look_div hidden">
    <div class="look_div_one">
        <div class="look_content">
            <p><span>编码：<input type="text" id="content_one" readonly value=""></span></p>
            <p><span>分类名称：<input type="text" id="content_two" readonly value=""></span></p>
            <p><span>分类说明：<input type="text" id="content_three" readonly value=""></span></p>
            <p><span>显示状态：</span></p><textarea id="content_four" cols="40%" rows="10" readonly value=""></textarea>
        </div>
        <div class="cancle_div">
            <button type="button" class="cancle-button">关闭</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#usual1 ul").idTabs();

    $(".button_see").click(function(){
        var id = $(this).attr("data-id");

        $.ajax({
            type : "POST",
            url : "<?php echo u('Category/category_look');?>",
            data : {id : id},
            dataType : 'json',
            success : function(data) {
                if (data) {
                    $("#content_one").val(data['id']);
                    $("#content_two").val(data['parent_id']);
                    $("#content_three").val(data['cate_content']);
                    $("#content_four").val(data['is_show']);
                    $(".look_div").removeClass("hidden");
                }
            }
        });

    });

    $(".button_edit").click(function (){
        var id = $(this).attr("data-id");
        window.location.href = "<?php echo u('Category/category_edit');?>?id="+id;
    });

    $(".cancle-button").click(function(){
        $(".look_div").addClass("hidden");
    });

    $(".is_show").click(function(){
        var id = $(this).attr("data_id");
        var type_id = $(this).attr("type_id");

        $.ajax({
            type: "POST",
            url : "<?php echo u('Category/is_show');?>",
            data: {type_id:type_id,id:id},
            dataType : 'json',
            success : function(data) {
                if (data) {
                    location.reload();//刷新当前页
                } else {
                    alert("修改失败");
                }
            }
        });

    });

    $(".btn").click(function(){
        $.ajax({
            type: "POST",
            url : "<?php echo u('Category/cate_add');?>",
            data: $("#data-form").serializeArray(),
            dataType : 'json',
            success : function(data) {
                console.log(data);
                if (data["status"] == true) {
                    swal({
                        title : "新增成功",
                        text : "",
                        type : "success",
                    },function(){
                        location.reload();
                    });
                } else {
                    swal(data["message"],"","error");
                }
            }
        });
    });

</script>

<!--<script type="text/javascript">-->
    <!--$("#usual1 ul").idTabs();-->
<!--</script>-->

<!--<script type="text/javascript">-->
    <!--$('.tablelist tbody tr:odd').addClass('odd');-->
<!--</script>-->
</body>

</html>