<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>chinavec门户管理中心</title>
<link href="./css/base.css" rel="stylesheet" type="text/css" /><!--链接表格样式-->
<link href="css/contentdistribution.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script><!--链接当前时间输出-->
<script type="text/javascript" src="js/base.js"></script>
<link href="css/boot.css" rel="stylesheet" type="text/css"></link>
<link href="../css/common_fang.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/distributionselect.js"></script><!--链接-->
<style>
	#container_left ul li.cDhandtimedistr{background-color:#108dbd;}
	#container_left ul li.cDhandtimedistr a{color:#FFF;}
	
</style> 
<script type="text/javascript">
	 $(function(){
		$("<img src='../img/lbg.gif'></img>").appendTo("#container_left ul li.cDhanddele");
		});
	 $(function () { 
		$("#selectAll").click(function () {//全选  
			$(":checkbox").prop("checked", true);  
		});  
		$("#unSelect").click(function () {//全不选  
			$(":checkbox").prop("checked", false);  
		});  
	}); 
	$(function(){
			$("<img src='img/lbg.gif'></img>").appendTo("#container_left ul li.cDhandtimedistr");
		});
	$("#authForm").submit(function() {
			if ($("#title").val() && $("#abstract").val() && $("#Type").val()&& $("#photo").val()&& $("#video").val()) {
							return true;
						}
						else {
							alert("请填写完整信息！");
							return false;
						}
					});
				});
</script>
</head>
<body>
	<?php include('./common/admin_header.php'); ?>
    <div id="container" class="clearfix">
    	<div id="container_left" class="left"style="margin-top: -14px;">
			<?php include("common/leftMenu.html"); ?>
        </div>
        <div id="container_right" class="right" style="text-align:center">
		    
			   
                <form id="searchInput" action="searchm.php" method="get">
                  <tr> 
					   <td width="260" height="30" align="right"><input type="text"  placeholder="输入标题或者内容查询" name="q" style="width: 160px;"/></td>
					   <td width = "45" height= "30" align="center"><input class="btn btn-info" type="submit" value="搜索" /></td>
                    <td width = "100" height= "30" align="center"><span class="font-lan14cu"><a href="index.php">清除搜索条件</a></span></td>
					</tr>
                  </form>	
				  <div class="rtf">
				<p><span>素材库</span></p>
			</div>	
			<div id="u1" class="u1">
				<div id="u1_line" class="u1_line"></div>
			</div>
           <form name="input" id="authForm" action="materialaddpro.php"  method="POST" enctype='multipart/form-data'>
		
			  <table class="newtable" width="90%" style="margin: auto">
				<thead>
          
        
    <tr>
        <td width="10%">标题</td>
        <td><input type="text" name="title" id="title" style="width:452px;height:100%;"/></td>
<tr><tr></tr><tr></tr>

        <td class="tableleft">素材摘要</td>
        <td><textarea name="abstract" id="abstract" title="abstract" rows="8" cols="40" style="width:450px;height:172px;"></textarea></td>
    </tr>    
    <tr>
        <td class="tableleft">类别</td>
                         <td>
                            <select name="Type" id="Type" title="分类">
                                <option value="" selected="selected">请选择分类</option>
                                <option value="1">视频素材</option>
                                <option value="2">原创音乐</option>
                                
                            </select>
                        </td>
                    </tr>
    <tr>
<tr>
        <td for="file">图片:</td>
        <td>上传图片：
        <input style="margin-left:22px" name='photo' id='photo' type='file'/>
        </td>
    </tr>
<tr>
        <td class="tableleft">音视频</td>
        <td>上传音视频片段：
        <input name='video' type='file' id='video'/><span>(视频请使用mp4格式，音频mp3格式)</span>
        </td>

    </tr>
   
    <tr> 
        <td width="10%"></td>
        <td><input name="time" type="hidden" id="time" value="<?php echo date('Y-m-d H:i:s');?>">
</td>
    </tr>
</table>
        <br/><br/>
            <button type="submit" class="btn btn-info" type="button">提交</button>&nbsp;&nbsp;<button type="button" class="btn" name="backid" id="backid" onclick="window.location='material.php'">取消</button>
    

</form>
                      
                    </tr>
				</thead>
				</table>
				<table class="mytable" width="90%" style="margin:auto;">
				<tbody>
               
				</tbody>
			
			          <tr><td align="right">
					
                         
            
						<input type="hidden" name="time" value="<?php echo date('Y-m-d H:i:s');?>"/> 
						</td></tr>
			</table>
		</form>
		</div>
	  </div>
    <?php include('./common/admin_footer.html'); ?>
</body>
</html>		  
    
