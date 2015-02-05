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
<script type="text/javascript" src="js/distributionselect.js"></script><!--链接筛选-->
<!--链接时间选择
 <script type="text/javascript" src="js/nogray_js/1.1.3/ng_all.js"></script>
<script type="text/javascript" src="js/nogray_js/1.1.3/components/timepicker.js"></script>
<script type="text/javascript" src="js/nogray_js/1.1.3/components/calendar.js"></script> -->
<style>
	#container_left ul li.cDhanddistr{background-color:#108dbd;}
	#container_left ul li.cDhanddistr a{color:#FFF;}
</style> 
<script type="text/javascript">
	 $(function(){
		$("<img src='../img/lbg.gif'></img>").appendTo("#container_left ul li.cDhanddele");
		});
	 $(function () { 
 		//if ($(":checkbox").length==0){
		if ($("#list").attr("checked")==true){
		$("#selectAll").click(function () {//全选  
			$(":checkbox").prop("checked", true);  
		}); 
		}else{
		$("#selectAll").click(function () {//全不选  
			$(":checkbox").prop("checked", false);  
		});  }
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
	function tanchu(b){
	     return confirm(b);
	}
	$(function(){
			$("<img src='img/lbg.gif'></img>").appendTo("#container_left ul li.cDhanddistr");
		});
</script>

</head>
<body>
	<?php include('./common/admin_header.php');?>
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
			<form id="buttonInput" action="newsadd.php" method="get">
			 <table >
				   <tr>
			      <td><input class="btn btn-success" type=button value="全选/全不选" id="select" onclick = "selectInvert('ID_Dele[]');"></td>
				<!--<td> <input class="btn btn-success"  type="button" value="全不选" id="unSelect" /></td>-->
			      <td> <input class="btn btn-primary" type="submit" value="新增" id="add" /></td>
				  </tr>
			 </table> 
          </form>		
           <form name="input" id="input" action="newsdelpro.php" method="POST" >
		
			 <table class="mytable" width="95%" style="margin-right: auto;margin-left: auto;">
				<thead>
                    <tr>
                        <th width="1%"style="text-align: right;"><img src="img/bl.jpg" alt="" width="16" height="31" ></th>
                        <th width="8%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">编号</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
                        <th width="18%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">标题</th>
						<th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
                        <th width="15%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">内容</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
                        <th width="15%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">类别</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
						<th width="13%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">状态</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
			<th width="10%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">执行时间</th>
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
  $page_num =8;//每页记录数为8
        if (!isset($_GET['page_no']))//page_no 空
          {
              $page_no = 1;
          }
        else {
            $page_no = $_GET['page_no'];
        }
          $start_num = $page_num * ($page_no - 1);//起始行号
          $sql = "SELECT * from `college` limit $start_num, $page_num"; 

			 //$sql  ="SELECT * FROM `college`";
			 $query=mysql_query($sql);
			//$result=mysql_fetch_array($query);
			//echo $result[2];
			//echo $sql;
			//exit;
			$nums = mysql_num_rows($query); 
while ($result_row = mysql_fetch_assoc($query)) {
	$title = mb_substr($result_row['title'],0,7,'utf-8')."...";
	$result_row['content']=strip_tags($result_row['content']);
	$str = mb_substr($result_row['content'],0,6,'utf-8')."...";
	if($str==''){
		$str="...";		
		}
	switch($result_row['college_type_id'])
                         {
			  case 1:
                            $Type= "教程展示";
                            break;
                          case 2:
                            $Type= "剧本推荐";
                            break;
                         case 3:
                            $Type= "新闻资讯";
                            break;
						
                         default:
                         }
    echo <<<TEXT
<div>
	<tr class="distr" >
						<td width="10%" align="center" valign="middle" class="font-hui">{$result_row['id']}</td>
                        <td width="18%" align="center" valign="middle" class="font-hui">{$title}</td>
                        <td width="14%" align="center" valign="middle" class="font-hui">$str</td>
						<td width="16%" align="center" valign="middle" class="font-hui">{$Type}</td>
						<td width="16%" align="center" valign="middle" class="font-hui">已发布</td>
						<td width="12%" align="center" valign="middle" class="font-hui">{$result_row['create_time']}</td>
						<td width="22%" align="center" valign="middle"><a href="newsedit.php?id={$result_row['id']}">编辑</a>
                         <a href="newsdelpro.php?id={$result_row['id']}" onclick="if(confirm('确定要删除此条记录吗？')) return submit();else return false;">&nbsp;&nbsp;删除</a>
<input name="ID_Dele[]" type="checkbox" id="ID_Dele[]" value="{$result_row['id']}"/>
						 
						 </td>
						 </tr>
</div>
TEXT;
        }			
	?>	
				</tbody>
	<tr><td>
						<input type="submit" class="button" value="删除已选" onclick="return tanchu('确定删除吗？');"/>
						</td>
</tr>
			</table>
		</form>
            <!--page start-->
            <div class="page">

  <span id="jilu1">显示<?php echo $nums; ?>条记录</span>
    <span id="jilu2">
        <?php
		$sql1 = "SELECT * from `college`";
		$result1 = mysql_query($sql1);
		$numss = mysql_num_rows($result1);
		$page = ceil($numss/$page_num);
            if ($page_no > 1) {
                    echo "<a href ='index.php?page_no=".($page_no-1)."'>上一页</a>&nbsp;&nbsp;&nbsp;";
                }else{
                    echo '<span>上一页</span>&nbsp;&nbsp;&nbsp;';
                }
                echo '<strong>第'.$page_no.'页/共'.$page.'页</strong>';
                if ($nums == $page_num) {
                    echo "&nbsp;&nbsp;&nbsp;<a href ='index.php?page_no=".($page_no+1)."'>下一页</a>";
                }else{
                    echo '&nbsp;&nbsp;&nbsp;<span>下一页</span>';
                }
        ?>
    </span>          
</div>
 </div>
            <!--page end-->
		</div>
	  </div>
    <?php include('./common/admin_footer.html'); ?>
</body>
</html>		  
    
	  


    
