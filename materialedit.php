<?php date_default_timezone_set("Asia/Shanghai");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
		$("<img src='img/lbg.gif'></img>").appendTo("#container_left ul li.cDhanddele");
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
	$(function(){
	$("#authForm").submit(function() {
			if ($("#title").val() && $("#abstract").val()) {
							return true;
						}
						else {
							alert("请填写完整信息！");
							return false;
						}
					})
				});
	$(function(){
			$("#charge").click(function() {
					$("#old").remove();
					$("#charge").hide();
					$("#photo").attr("style","display:inline");	
				})
		});
	$(function(){
			$("#charge1").click(function() {
					$("#old1").remove();
					$("#charge1").hide();
					$("#video").attr("style","display:inline");	
				})
		});
</script>
</head>
<body>
	<?php include('./common/admin_header.php'); 

	$validid = $_GET['id'];

	?>
    <div id="container" class="clearfix">
    	<div id="container_left" class="left"style="margin-top: -14px;">
			<?php include("common/leftMenu.html"); ?>
        </div>
        <div id="container_right" class="right" style="text-align:center">
		    
			   
                <form id="searchInput" action="searchm.php" method="get">
                  <tr> 
					   <td width="260" height="30" align="right"><input type="text"  placeholder="输入视频或者类型名称查询" name="q" style="width: 160px;"/></td>
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
			
           <?php
          include "./lib/connect.php";
		  $sql  ="SELECT  `material`.`id`,`title`,`abstract`,`photo_url`,`file_url`,`create_time`,`material_type_id`,`name`
				FROM `material` right join `material_type` on `material`.`material_type_id` = `material_type`.`id`
				WHERE `material`.`id`=$validid";
		  $query=mysql_query($sql);
		  $row = mysql_fetch_array($query);
		  //print_r($row);
		  //exit;	
		  ?>		
           <form name="input" id="authForm" action="materialupdate.php?id=<?php echo $validid ?>" method="POST" enctype="multipart/form-data">
		
			  <table class="newtable" width="90%" style="margin: auto">
				<thead>
    <tr>
        <td width="10%">标题</td>
        <td><input type="text" id="title" name="title" style="width:452px;height:100%;" value="<?php echo $row['title'];?>" /></td>
<tr>
        <td class="tableleft">素材信息</td>
        <td><textarea name="abstract" id="abstract" title="abstract" rows="8" cols="40" style="width:450px;height:172px;"><?php echo $row['abstract'];?></textarea></td>
    </tr>    
    <tr>
        <td class="tableleft">类别</td>
                         <td>
                            <select name="Type" id="Type" title="分类">
                                <option value="" selected="selected"><?php echo $row['name'];?></option>
                                <option value="1">视频素材</option>
                                <option value="2">原创配乐</option>
                                
                            </select>
                        </td>
                    </tr>   
<tr>

<tr>
        <td class="tableleft">照片</td>
        <td>上传图片：
		<?php
		if($row['photo_url']!=''){
					$arr = explode("/",$row['photo_url']);
				echo "<span id='old'>已有图片&nbsp;&nbsp;&nbsp;$arr[6]</span><input style='margin-left:22px;display:none;' name='photo' type='file' id='photo' />&nbsp;&nbsp;<input type='button' value='重新上传' id='charge'></input>";				
				}else{
       echo "<input style='margin-left:22px;' name='photo' type='file' id='photo' />";
				}		
		
		?>
        </td>
    </tr>
<tr>
        <td class="tableleft">视频</td>
        <td>上传音视频片段：
		<?php
		if($row['file_url']!=''){
					$arr1 = explode("/",$row['file_url']);
				       echo "<span id='old1'>已有音视频片段&nbsp;&nbsp;&nbsp;$arr1[6]</span><input style='display:none' name='video' type='file' id='video'/>&nbsp;&nbsp;<input type='button' value='重新上传' id='charge1'></input>";				
				}else{
       echo "<input name='video' type='file' />";
				}		
		
		?>
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
 </div>
    <?php include('./common/admin_footer.html'); ?>
</body>
</html>		  
    
