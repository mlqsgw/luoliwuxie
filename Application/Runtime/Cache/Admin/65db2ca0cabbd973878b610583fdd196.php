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
    .look {width:56px;height:24px;cursor:pointer;}
    .cancle-button {cursor:pointer;}
    .edit {width:56px;height:24px;cursor:pointer;}
    .delete {width:56px;height:24px;cursor:pointer;}
    .look_div {height: 100%;width:100%;position: fixed;top:0;z-index:1000;background-color:rgba(0,0,0,0.2);}
    .look_div_one {width:90%;height:90%;position:fixed;left:6%;z-index:1001;background-color:#ffffff;}
    .cancle_div {width:60px;height:30px;background-color:#6767ca;margin-left:45%;margin-top:5%;}
    .cancle-button {width:100%;height:100%;background-color:#6767ca;color:#fff;margin-top:5%;}
    .look_content {margin:auto;width:80%;background-color: #cccccc;}
    .look_content span {margin:20px 0px 0px 10px;}
    .look_content input {border:1px solid #6767ca;}
    #content_one {position:relative;margin-left:5%;}#content_two {position:relative;margin-left:5%;}
    #content_four {position:relative;margin-left:5%;}#content_five {position:relative;margin-left:5%;}
    #content_three{position:relative;margin-left:2%;}#content_six{position:relative;margin-left:2%;}
    #content_seven{width:75%;margin-left:13%;}
</style>

<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
    width : 345       
  });
  
});
</script>


<!--图片预览-->
<script type="text/javascript"> 

function previewImage(file)  
{  
  var MAXWIDTH  = 300;  
  var MAXHEIGHT = 200;  
  var div = document.getElementById('preview_da');  
  if (file.files && file.files[0])  
  {  
    div.innerHTML = '<img id=imghead_da>';  
    var img = document.getElementById('imghead_da');  
    img.onload = function(){  
      var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);  
      img.width = rect.width;  
      img.height = rect.height;  
      img.style.marginLeft = rect.left+'px';  
      img.style.marginTop = rect.top+'px';  
    }  
    var reader = new FileReader();  
    reader.onload = function(evt){img.src = evt.target.result;}  
    reader.readAsDataURL(file.files[0]);  
  }  
  else  
  {  
    var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';  
    file.select();  
    var src = document.selection.createRange().text;  
    div.innerHTML = '<img id=imghead_da>';  
    var img = document.getElementById('imghead_da');  
    img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;  
    var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);  
    status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);  
    div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;margin-left:"+rect.left+"px;"+sFilter+src+"\"'></div>";  
  }  
} 
function clacImgZoomParam( maxWidth, maxHeight, width, height ){  
    var param = {top:0, left:0, width:width, height:height};  
    if( width>maxWidth || height>maxHeight )  
    {  
        rateWidth = width / maxWidth;  
        rateHeight = height / maxHeight;  
          
        if( rateWidth > rateHeight )  
        {  
            param.width =  maxWidth;  
            param.height = Math.round(height / rateWidth);  
        }else  
        {  
            param.width = Math.round(width / rateHeight);  
            param.height = maxHeight;  
        }  
    }  
      
    param.left = Math.round((maxWidth - param.width) / 2);  
    param.top = Math.round((maxHeight - param.height) / 2);  
    return param;  
}  
</script>


<!--编辑器-->
<!--<script charset="utf-8" src="/luoliwuxie/Public/editor/kindeditor.js"></script>-->
<!--<script charset="utf-8" src="/luoliwuxie/Public/editor/lang/zh_CN.js"></script>-->
<script>
//  KindEditor.ready(function(K) {
//          window.editor = K.create('#editor_id');
//  });
</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="/luoliwuxie/Admin/Index/main">首页</a></li>
    <li><a href="javascript:;">信息管理</a></li>
    </ul>
    </div>
    
    <div class="formbody">
  
    <div id="usual1" class="usual"> 
    <div class="itab">
  	<ul> 
  	 <li><a href="#tab2" class="selected">信息列表</a></li> 
     <li><a href="#tab1" >添加新信息</a></li> 
  	</ul>
    </div> 
    

    <!--栏目添加-->
  <div id="tab1" class="tabson">
    <div class="formtext">
        Hi，<b>超级管理员</b>，欢迎您使用栏目管理！
    </div>
  <form action="<?php echo U('Category/content_add');?>" enctype="multipart/form-data" method="post">
    <ul class="forminfo">
  
    <li>
      <label>所属栏目<b>*</b></label>
      <div class="vocation">
        <select class="select1" name='cate_id'>
           <option value="0">一级栏目</option>
           <?php if(is_array($data_cate)): $i = 0; $__LIST__ = $data_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["cate_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
      </div>
    </li>

    <li>
       <label>标题<b>*</b></label>
       <input name="news_title" type="text" class="dfinput" />
    </li>

    <li>
      <label>图片<b>*</b></label>
      <input name="images" type="file" onchange="previewImage(this)"  /><i>支持图片类型：jpg、gif 、png、jpeg</i>
    </li>

    <li>
      <label>预览<b>*</b></label>
      <span id="preview_da">
        <img id="imghead" src="/luoliwuxie/Public/admin/images/nopic.gif" width='300' height='200' border=0 >
      </span>
    </li>
     
    <li>
      <label>内容<b>*</b></label>
      <textarea id="editor_id" name="news_content">
      </textarea>
    </li>

    <li><label>&nbsp;</label>
      <input name="sub" type="submit" class="btn" value="马上发布"/>
    </li>

    </ul>
    </form>
    </div> 

    <!--内容列表-->
  	<div id="tab2" class="tabson">
    <table class="tablelist">
    	<thead>
    	<tr>
        <th style="width:10%;">编号</th>
        <th style="width:10%;">标题</th>
        <th style="width:10%;">所属栏目</th>
        <th style="width:10%;">发布时间</th>
        <th style="width:30%;">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($news_data)): $i = 0; $__LIST__ = $news_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["news_title"]); ?></td>
                <td><?php echo ($vo["category_data"]["cate_name"]); ?></td>
                <td><?php echo date('Y-m-d H:i:s',$vo['create_time']);?></td>
                <td>
                    <button class="look" look_id="<?php echo ($vo["id"]); ?>">查看</button>
                    <button class="edit" edit_id="<?php echo ($vo["id"]); ?>">编辑</button>
                    <button class="delete" delete_id="<?php echo ($vo["id"]); ?>">删除</button>
                </td>

            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div class="pagin">
      <div class="message">共<i class="blue"> <?php echo $count;?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo $p;?>&nbsp;</i>页</div>
        <ul class="paginList">
        <li class="paginItem"> <?php echo $page;?></li>
        </ul>
    </div>

    <!--弹出层-->
    <div class="look_div hidden">
        <div class="look_div_one">
            <div class="look_content">
                <p><span>编码：<input type="text" id="content_one" readonly value=""></span></p>
                <p><span>标题：<input type="text" id="content_two" readonly value=""></span></p>
                <p><span>所属栏目：<input type="text" id="content_three" readonly value=""></span></p>
                <p><span>图片：<input type="text" id="content_four" readonly value=""><img src=""></span></p>
                <p><span>内容：<input type="text" id="content_five" readonly value=""></span></p>
                <p><span>创建时间：<input type="text" id="content_six" readonly value=""></span></p>
                <p><span>显示状态：</span></p><textarea id="content_seven" cols="40%" rows="10" readonly value=""></textarea>
            </div>
            <div class="cancle_div">
                <button type="button" class="cancle-button">关闭</button>
            </div>
        </div>
    </div>

  </div>

  </div>

  </div>

  <script type="text/javascript">
      $("#usual1 ul").idTabs();
  </script>

  <!--<script type="text/javascript">-->
    <!--$('.tablelist tbody tr:odd').addClass('odd');-->
  <!--</script>-->
    <script type="text/javascript">
        $(".look").click(function(){
            var id = $(this).attr("look_id");
            $.ajax({
                type : "POST",
                url : "<?php echo u('Category/content_look');?>",
                data : {id : id},
                dataType : 'json',
                success : function (data) {
                    $("#content_one").val(data["id"]);
                    $("#content_two").val(data["news_title"]);
                    $("#content_three").val(data["category_data"]["cate_name"]);
                    $("#content_four").val(data["images"]);
                    $("#content_five").val(data["news_content"]);
                    $("#content_six").val(data["create_time"]);
                    $("#content_seven").val(data["is_show"]);
                }
            });

            $(".look_div").removeClass("hidden");
        });
        $(".edit").click(function(){
            var id = $(this).attr("edit_id");
            window.location.href = "<?php echo u('Category/content_edit');?>?id="+id;
        });
        $(".delete").click(function(){
            var id = $(this).attr("delete_id");
            $.ajax({
                type : "POST",
                url : "<?php echo u('Category/content_delete');?>",
                data : {id : id},
                dataType : 'json',
                success : function(data){
                    if (data) {
                        swal({
                            title : "删除成功",
                            text : "",
                            type : "success",
                        },function(){
                            location.reload();
                        });
                    } else {
                        swal("删除失败","","error");
                    }
                }
            });
        });

        $(".cancle-button").click(function(){
            $(".look_div").addClass("hidden");
        });
    </script>
</body>

</html>