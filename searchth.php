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
<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
	function selectInvert(name){  
	    $("[name='"+name+"']").each(function(){//反选  
	    if($(this).attr("checked")){  
		  $(this).removeAttr("checked");  
	    }else{  
		  $(this).attr("checked",'true');  
	    }  
	    })  
	}
</script>

</head>
<body>
	<?php include('./common/admin_header.php'); 
			$keyword = $_GET['q'];
		
	?>
    <div id="container" class="clearfix">
    	<div id="container_left" class="left"style="margin-top: -14px;">
			<?php include("common/leftMenu.html"); ?>
        </div>
        <div id="container_right" class="right" style="text-align:center">
		    
			   
                <form id="searchInput" action="searchth.php" method="get">
                  <tr> 
					   <td width="260" height="30" align="right"><input type="text"  placeholder="输入标题或者内容查询" name="q" style="width: 160px;"/></td>
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
			<form id="buttonInput" action="photoadd.php" method="get">
			 <table >
				   <tr>
			      <td> <input class="btn btn-success"  type="button" value="全选/全不选" id="select" onclick = "selectInvert('ID_Dele[]');"/></td>
				
			      <td> <input class="btn btn-primary"  type="submit" value="新增" id="add" /></td>
				  </tr>
			 </table> 
          </form>		
          
     
           <form name="input" action="photodel.php" method="POST" >
		
			 <table class="mytable" width="95%" style="margin-right: auto;margin-left: auto;">
				<thead>
                    <tr>
                        <th width="1%"style="text-align: right;"><img src="img/bl.jpg" alt="" width="16" height="31" ></th>
                        <th width="10%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">编号</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
                        <th width="16%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">姓名</th>
						<th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
                        <th width="18%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">邮箱</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
                        <th width="8%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">类别</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
						<th width="16%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">个人简介</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
						   <th width="12%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">执行时间</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
						   <th width="22%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">操作</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
                        <th width="10%"><img src="img/br.jpg" alt="" width="16" height="31" /></th>
                    </tr>
				</thead>
				</table>
				<table class="mytable" width="90%" style="margin:auto;">
				<tbody>
                  <?php
  include "./lib/connect.php";
  $page_num =20;//每页记录数为10
        if (!isset($_GET['page_no']))//page_no 空
          {
              $page_no = 1;
          }
        else {
            $page_no = $_GET['page_no'];
        }
          $start_num = $page_num * ($page_no - 1);//起始行号
         $sql="SELECT * from `photo_wall` where `name` like '%".$keyword."%' or `abstract` like '%".$keyword."%' LIMIT $start_num, $page_num";

			 
			 $query=mysql_query($sql);
			//$result=mysql_fetch_array($query);
			//echo $result[2];
			//echo $sql;
			//exit;
			$nums = mysql_num_rows($query); 
			if($nums==0){
				echo "<div style='align:center;font-size:16px'>未找到你所需的信息</div>";
				exit;
				}else{
while ($result_row = mysql_fetch_assoc($query)) {
	$abstract = mb_substr($result_row['abstract'],0,10,'utf-8')."...";
	$mail     = mb_substr($result_row['mail'],0,10,'utf-8')."...";
	if($result_row['photo_url'])
		$photo = '有';
	else
		$photo = '无'; 
	switch($result_row['photo_type_id'])
                         {
			  case 1:
                            $Type= "新锐导演";
                            break;
                          case 2:
                            $Type= "演员";
                            break;
                         case 3:
                            $Type= "名导师";
                            break;
						case 4:
                            $Type= "制作人";
                            break;
                         default:
                         }
    echo <<<TEXT
<div>
	<tr class="distr" >
			<td width="8%" align="center" valign="middle" class="font-hui">{$result_row['id']}</td>
                        <td width="16%" align="center" valign="middle" class="font-hui">{$result_row['name']}</td>
                        <td width="18%" align="center" valign="middle" class="font-hui">$mail</td>
						<td width="15%" align="center" valign="middle" class="font-hui">$Type</td>
						<td width="16%" align="center" valign="middle" class="font-hui">$abstract</td>
						<td width="12%" align="center" valign="middle" class="font-hui">{$result_row['create_time']}</td>
						<td width="22%" align="center" valign="middle"><a href="photoedit.php?id={$result_row['id']}">编辑</a>
                         <a href="photodel.php?id={$result_row['id']}" onclick="if(confirm('确定要删除此条记录吗？')) return submit();else return false;">&nbsp;&nbsp;删除</a>
						 <input name="ID_Dele[]" type="checkbox" id="ID_Dele[]" value="{$result_row['id']}"/>
						 </td>
						 </tr>
</div>
TEXT;
        }
}			
	?>	
               </tbody>
	<tr><td>
						<input type="submit" class="button" value="删除已选" />
						</td></tr>
			</table>
		</form>
            <!--page start-->
                      <div class="page">

  <span id="jilu1">显示<?php echo $nums; ?>条记录</span>
    <span id="jilu2">
        <?php
		$sql1 = "SELECT * from `photo_wall` where `name` like '%".$keyword."%' or `abstract` like '%".$keyword."%'";
		$result1 = mysql_query($sql1);
		$numss = mysql_num_rows($result1);
		$page = ceil($numss/$page_num);
            if ($page_no > 1) {
                    echo "<a href ='photo.php?page_no=".($page_no-1)."'>上一页</a>&nbsp;&nbsp;&nbsp;";
                }else{
                    echo '<span>上一页</span>&nbsp;&nbsp;&nbsp;';
                }
                echo '<strong>第'.$page_no.'页/共'.$page.'页</strong>';
                if ($nums == $page_num) {
                    echo "&nbsp;&nbsp;&nbsp;<a href ='photo.php?page_no=".($page_no+1)."'>下一页</a>";
                }else{
                    echo '&nbsp;&nbsp;&nbsp;<span>下一页</span>';
                }
        ?>
    </span>          
</div>


		</div>
	  </div>
    <?php include('./common/admin_footer.html'); ?>
</body>
</html>		  
    
