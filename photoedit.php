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
<link href="../css/common_fang.css" rel="stylesheet" type="text/css" />
<link href="css/boot.css" rel="stylesheet" type="text/css"></link>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/distributionselect.js"></script><!--链接-->
<style>
	#container_left ul li.Dhanddele{background-color:#108dbd;}
	#container_left ul li.Dhanddele a{color:#FFF;}
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
			$("<img src='img/lbg.gif'></img>").appendTo("#container_left ul li.Dhanddele");
		}); 
	$(function() {
					
	$("#authForm").submit(function() {
			if ($("#email").val() && $("#name").val() && $("#dscrp").val()&& $("#mp").val()) {
							return true;
						}
						else {
							alert("请填写完整信息！");
							return false;
						}
					});
				});
	$(function(){
			$("#charge").click(function() {
					$("#old").remove();
					$("#charge").hide();
					$("#photo").attr("style","display:inline");	
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
		    
			   
                <form id="searchInput" action="" method="get">
                  <tr> 
					   <td width="260" height="30" align="right"><input type="text"  placeholder="输入视频或者类型名称查询" name="q" style="width: 160px;"/></td>
					   <td width = "45" height= "30" align="center"><input class="btn btn-info" type="submit" value="搜索" /></td>
                    <td width = "100" height= "30" align="center"><span class="font-lan14cu"><a href="index.php">清除搜索条件</a></span></td>
					</tr>
                  </form>	
				  <div class="rtf">
				<p><span>照片墙</span></p>
			</div>	
			<div id="u1" class="u1">
				<div id="u1_line" class="u1_line"></div>
			</div>
			
		  <?php
          include "./lib/connect.php";
		  $sql  ="SELECT  `photo_wall`.`id`,`photo_wall`.`name`,`mail`,`photo_url`,`star`,`blood_type`,`mp`,`create_time`,`photo_type_id`,`wechat`,`qq`,`star`,`blood_type`,`abstract`,`photo_type`.`name`
				FROM `photo_wall` right join `photo_type` on `photo_wall`.`photo_type_id` = `photo_type`.`id`
				WHERE `photo_wall`.`id`=$validid";
		  $query=mysql_query($sql);
		  $row = mysql_fetch_array($query);
		  //print_r($row);
		  //exit;	
		  ?>	
           <form name="input" id="authForm" action="photoeditpro.php?id=<?php echo $validid ?>" method="POST" enctype="multipart/form-data">
		
			  <table class="newtable" width="90%" style="margin: auto">
				<thead>
 <div style="text-align:left;margin-left:40px;font-size:15px;"><font color='red'>*</font>为必填项</div>          
        <td width="10%">姓名</td>
        <td><input type="text" name="name" id="name" style="width:50%;height:100%;" value="<?php echo $row['1'];?>"/><font color='red'>*</font></td>
    </tr>
    </tr> 
	<tr>
        <td width="10%">手机</td>
        <td><input type="text" name="mp" id="mp" style="width:50%;height:100%;" value="<?php echo $row['mp'];?>" /><font color='red'>*</font></td>
    </tr>
    <tr>
        <td width="10%">邮箱</td>
        <td><input type="text" name="mail" id="email" style="width:50%;height:100%;" value="<?php echo $row['mail'];?>"/><font color='red'>*</font></td>
<tr>
        <td class="tableleft">个人简介</td>
        <td><textarea name="dscrp" id="dscrp" title="content" rows="8" cols="40" style="width:450px;height:150px;"><?php echo $row['abstract'];?></textarea><font color='red'>*</font></td>
    </tr>
<tr>
	<?php
		if($row['star']==''){
			$star = '选择星座';
					}else{
			$star = $row['star'];
				}


	?>
        <td class="tableleft">星座</td>
                         <td>
                            <select name="star" id="star" title="分类">
                                <option value="" selected="selected"><?php echo $star;?></option>
                                <option value="白羊座">白羊座</option>
                                <option value="金牛座">金牛座</option>
                                <option value="双子座">双子座</option>
                                <option value="巨蟹座">巨蟹座</option>
				<option value="狮子座">狮子座</option>
				<option value="处女座">处女座</option>
				<option value="天秤座">天秤座</option>
				<option value="天蝎座">天蝎座</option>
				<option value="射手座">射手座</option>
				<option value="摩羯座">摩羯座</option>
				<option value="水瓶座">水瓶座</option>
				<option value="双鱼座">双鱼座</option>
                            </select>
                        </td>
    </tr>
	<tr>
	<?php
		if($row['blood_type']==''){
			$blood = '选择血型';
					}else{
			$blood = $row['blood_type'];
				}


	?>
        <td class="tableleft">血型</td>
                         <td>
                            <select name="blood" id="blood" title="分类">
                                <option value="" selected="selected"><?php echo $blood;?></option>
                                <option value="A型">A型</option>
                                <option value="B型">B型</option>
                                <option value="O型">O型</option>
                                <option value="AB型">AB型</option>
                            </select>
                        </td>
    </tr> 
	<tr>
        <td width="10%">微信</td>
        <td><input type="text" name="wechat" value="<?php echo $row['wechat'];?>"/></td>
    </tr>
	<tr>
        <td width="10%">QQ</td>
        <td><input type="text" name="qq" value="<?php echo $row['qq'];?>"/></td>
	<tr>  
    <tr>    
    <tr>
        <td class="tableleft">类别</td>
                         <td>
                            <select name="Type" id="videoType" title="分类" >
                                <option value="" selected="selected"><?php echo $row['name'];?></option>
                                <option value="1">新锐导演</option>
                                <option value="2">演员</option>
                                <option value="3">名导师</option>
                                <option value="4">制片人</option>
                                <option value="5">微电影人才</option>
                            </select><font color='red'>*</font>
                        </td>
                    </tr>
    <tr>
<tr>
        <td class="tableleft">照片</td>
        <td>上传图片：
		<?php
		if($row['photo_url']!=''){
					$arr = explode("/",$row['photo_url']);
				echo "<span id='old'>已有图片&nbsp;&nbsp;&nbsp;$arr[2]</span><input style='margin-left:22px;display:none;' name='file' type='file' id='photo' />&nbsp;&nbsp;<input type='button' value='重新上传' id='charge'></input>";				
				}else{
       echo "<input style='margin-left:22px;' name='file' type='file' id='photo' />";
				}		
		
		?>
        </td>
    </tr>
        <td width="10%"></td>
        <td><input name="time" type="hidden" id="time" value="<?php echo date('Y-m-d H:i:s');?>">
</td>
    </tr>
</table><br/>
        
            <button type="submit" class="btn btn-info" type="button">提交</button>&nbsp;&nbsp;<button type="button" class="btn" name="backid" id="backid" onclick="window.location='photo.php'">取消</button>
    

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
    
