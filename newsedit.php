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
<script type="text/javascript" src="js/distributionselect.js"></script><!--链接筛选-->
<link href="umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="umeditor/third-party/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="umeditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="umeditor/umeditor.min.js"></script>
<script type="text/javascript" src="umeditor/lang/zh-cn/zh-cn.js"></script>
<style>
	#container_left ul li.cDhanddistr{background-color:#108dbd;}
	#container_left ul li.cDhanddistr a{color:#FFF;}
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
			$("<img src='img/lbg.gif'></img>").appendTo("#container_left ul li.cDhanddistr");
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
		    
			   
                <form id="searchInput" action="search.php" method="get">
                  <tr> 
					   <td width="260" height="30" align="right"><input type="text"  placeholder="输入标题或者内容查询" name="q" style="width: 160px;"/></td>
					   <td width = "45" height= "30" align="center"><input class="btn btn-info" type="submit" value="搜索" /></td>
                    <td width = "100" height= "30" align="center"><span class="font-lan14cu"><a href="index.php">清除搜索条件</a></span></td>
					</tr>
                  </form>	
				  <div class="rtf">
				<p><span>教程与资讯</span></p>
			</div>	
			<div id="u1" class="u1">
				<div id="u1_line" class="u1_line"></div>
			</div>
			
          <?php
          include "./lib/connect.php";
		  $sql  ="SELECT  `college`.`id`,`title`,`content`,`create_time`,`college_type_id`,`name`
				FROM `college` right join `college_type` on `college`.`college_type_id` = `college_type`.`id`
				WHERE `college`.`id`=$validid";
		  $query=mysql_query($sql);
		  $row = mysql_fetch_array($query);
		  //print_r($row);
		  //exit;	
		  ?>	
           <form name="input" action="newseditpro.php?id=<?php echo $validid ?>" method="POST" >
		
			  <table class="newtable" width="90%" style="margin: auto">
				<thead>
          
        <td width="10%">标题</td>
        <td><input type="text" name="title" id="title" style="width:70%;height:100%;" value="<?php echo $row['title'];?>" /></td>
    </tr>
    <tr>
        <td class="tableleft">内容</td>
        <td><textarea name="content" type="text/plain" id="myEditor" style="width:600px;height:240px;"><?php echo $row['content'];?></textarea></td></td>
    </tr>   
    <tr>
        <td class="tableleft">分类</td>
                         <td>
                            <select name="Type" id="Type" title="分类">
                                <option value="" selected="selected"><?php echo $row['name']; ?></option>
                                <option value="1">教程展示</option>
                                <option value="2">剧本推荐</option>
                                <option value="3">新闻资讯</option>
                                
                            </select>
                        </td>
                    </tr>
    <tr>
    <tr> 
        <td width="10%"></td>
        <td><input name="time" type="hidden" id="time" value="<?php echo date('Y-m-d H:i:s');?>">
</td>
    </tr></table>
            <br/>
            <button type="submit" class="btn btn-info" type="button">提交</button>&nbsp;&nbsp;<button type="button" class="btn" name="backid" id="backid" onclick="window.location='index.php'">取消</button>
    

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
<script type="text/javascript">
    //实例化编辑器
    var um = UM.getEditor('myEditor');
    um.addListener('blur',function(){
        $('#focush2').html('编辑器失去焦点了')
    });
    um.addListener('focus',function(){
        $('#focush2').html('')
    });
    //按钮的操作

</script>

</html>		  
    
