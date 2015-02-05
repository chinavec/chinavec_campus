$str = substr($result_row['content'],0,10)."....";
<?php date_default_timezone_set("Asia/Shanghai");?>
<?php
//门户管理界面
//require('config/config.php');
//require('../config/config.php');
//require('../lib/db.class.php');
//require('../lib/util.class.php');
//require('../lib/connect.php');    //连接数据库
 include "./lib/connect.php";
   
//实例化数据库操作类
//$db = new DB();
//$u = new Util();
//分页，搜索
//设置搜索内容$q
$q = isset($_GET['q']) ? $_GET['q'] : '';
$pageSize = 30;//每页最大输出30行
//设置页码$page
$page = isset($_GET['page']) ? $_GET['page'] : 0;
//判断$page是否为整数并大于0
if(!(ctype_digit($page) && $page > 0)){
    $page = 1;
}
//内容的偏移量
$offset = ($page - 1) * $pageSize;
//若$q为空，读取表的全部信息；若$q不为空，读取和$q匹配的相关信息     
if($q == ''){
                 //未查询时当content_distribution表中video_id字段与video表id字段相同时链接content_distribution表与video表查询content_distribution表中video_id个数并按照content_distribution表distribution_status分发状态字段在（0--未进行过任何操作、7--即时删除成功、8--定时删除成功、11--即时分发失败、15--自动分发失败、17--自动删除成功）后使按照状态字段数字大小降序排列
/*$sqlCount = "SELECT COUNT(`video_id`) FROM `content_distribution`
                 right join`video` ON `video`.`id` = `content_distribution`.`video_id` right join `video_type` on `video_type`.`id` = `content_distribution`.`video_type_id` WHERE`content_distribution`.`distribution_status` IN(0,7,8,11,15,17) order by `distribution_status` DESC";
                 //未查询当content_distribution表中video_id字段与video表id字段相同时链接content_distribution表与video表按照content_distribution表distribution_status分发状态字段在0--未进行过任何操作、7--即时删除成功、8--定时删除成功、11--即时分发失败、15--自动分发失败、17--自动删除成功）后使按照状态字段数字大小降序排列按限制条件每页最大输出条数输出
$sql = "select * from `video` 
                    right join `content_distribution` on `video`.`id`=`content_distribution`.`video_id` right join `video_type` on `video_type`.`id` = `content_distribution`.`video_type_id` WHERE`content_distribution`.`distribution_status` IN(0,7,8,11,15,17) order by `distribution_status` DESC LIMIT $offset, $pageSize";
}else{
                    //查询时得出符合条件的`video`表`title`字段当content_distribution表中video_id字段与video表id字段相同时链接content_distribution表与video表查询content_distribution表中video_id个数并按照content_distribution表distribution_status分发状态字段在0--未进行过任何操作、7--即时删除成功、8--定时删除成功、11--即时分发失败、15--自动分发失败、17--自动删除成功）后使按照状态字段数字大小降序排列
$sqlCount = "SELECT COUNT(`video_id`) FROM `content_distribution`
                 right join `video` ON `video`.`id` = `content_distribution`.`video_id` right join `video_type` on `video_type`.`id` = `content_distribution`.`video_type_id`
                 WHERE `video`.`title_cn` LIKE '%$q%' AND `content_distribution`.`distribution_status` IN(0,7,8,11,15,17) order by `distribution_status` DESC";
   /*  $count = $db->count($sqlCount); */
    //查询时得出符合条件的`video`表`title`字段当content_distribution表中video_id字段与video表id字段相同时链接content_distribution表与video表并按照content_distribution表distribution_status分发状态字段在0--未进行过任何操作、7--即时删除成功、8--定时删除成功、11--即时分发失败、15--自动分发失败、17--自动删除成功）后使按照状态字段数字大小降序排列后使按照状态字段数字大小降序排列按限制条件每页最大输出条数输出
/*$sql = "select * from `video` 
                    right join `content_distribution` on `video`.`id`=`content_distribution`.`video_id` right join `video_type` on `video_type`.`id` = `content_distribution`.`video_type_id`
                    WHERE `video`.`title_cn` LIKE '%$q%' AND `content_distribution`.`distribution_status` IN(0,7,8,11,15,17) order by `distribution_status` DESC LIMIT $offset, $pageSize";
//}*/
$sql="select * from `college`";
}
//读取数据库结果
//$result= mysql_query($sql);
//定义页面网址URL
$basicURL = 'index.php?q='.$q;
//页码信息
//$pageInfo = $u->page($db->count($sqlCount), $page, $pageSize);
//关闭DB类数据库
//$db->close();*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>chinavec门户管理中心</title>
<link href="../css/base.css" rel="stylesheet" type="text/css" /><!--链接表格样式-->
<link href="css/contentdistribution.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script><!--链接当前时间输出-->
<script type="text/javascript" src="js/base.js"></script>
<link href="../css/common_fang.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/distributionselect.js"></script><!--链接筛选-->
<!--链接时间选择
 <script type="text/javascript" src="js/nogray_js/1.1.3/ng_all.js"></script>
<script type="text/javascript" src="js/nogray_js/1.1.3/components/timepicker.js"></script>
<script type="text/javascript" src="js/nogray_js/1.1.3/components/calendar.js"></script> -->
<style>
	#container_left ul li.cDhanddele{background-color:#108dbd;}
	#container_left ul li.cDhanddele a{color:#FFF;}
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
</script>
</head>
<body>
	<?php include('../common/admin_header.php'); 
         if (isset($_GET['id'])) {
			$validid = $_GET['id'];
		}
		else {
			$validid = -1;
		}
		function active($vali, $validid) {
			if ($vali == $validid) {
			echo "class='active'";
			}
		}
	/* 	//如果查询内容不存在则弹出警告窗口
	 if($count == 0 ){
	     echo "<Script language='javascript'>alert('抱歉，没有找到相关内容！');windowLocation:cDhanddistr.php;</Script>";
		}  */
	?>
    <div id="container" class="clearfix">
    	<div id="container_left" class="left"style="margin-top: -14px;">
			<?php include("common/leftMenu.html"); ?>
        </div>
        <div id="container_right" class="right" style="text-align:center">
		    
			   
                <form id="searchInput" action="" method="get">
                  <tr> 
					   <td width="260" height="30" align="right"><input type="text"  placeholder="输入视频或者类型名称查询" name="q" style="width: 160px;"/></td>
					   <td width = "45" height= "30" align="center"><input class="search" type="submit" value="搜索" /></td>
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
				  <td> <input class="button"  type='button' value='筛选' id='btn'/></td>
			      <td> <input class="button"  type='button' value='返回' id='allbtn'/></td>
			      <td> <input class="button"  type="button" value="全选" id="selectAll" /></td>
			      <td> <input class="button"  type="submit" value="新增" id="unSelect" /></td>
				  </tr>
			 </table> 
          </form>		
           <form name="input" action="handDistribution.php" method="POST" >
		
			  <table class="mytable" width="95%" style="margin-right: auto;margin-left: auto;">
				<thead>
                    <tr>
                        <th width="1%"style="text-align: right;"><img src="img/bl.jpg" alt="" width="16" height="31" ></th>
                        <th width="8%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">编号</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
                        <th width="20%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">标题</th>
						   <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
                        <th width="15%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">内容</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
                        <th width="15%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">类别</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
						   <th width="13%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">状态</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
						   <th width="10%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">执行时间</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
						   <th width="20%" align="center" valign="middle" background="img/bm.jpg" class="font-hui14">操作</th>
                        <th width="1%" align="center" valign="middle" background="img/bm.jpg"><img src="img/hsx.gif" alt="" width="1" height="7" /></th>
                        <th width="10%"><img src="img/br.jpg" alt="" width="16" height="31" /></th>
                    </tr>
				</thead>
				</table>
				<table  width="90%" style="margin:auto;">
				<tbody>
                <?php
  include "./lib/connect.php";
  $page_num =10;//每页记录数为10
        if (!isset($_GET['page_no']))//page_no 空
          {
              $page_no = 1;
          }
        else {
            $page_no = $_GET['page_no'];
        }
          $start_num = $page_num * ($page_no - 1);//起始行号
          $sql = "SELECT * from `college` limit $start_num, $page_num"; 

			 $sql  ="SELECT * FROM `college`";
			 $query=mysql_query($sql);
			//$result=mysql_fetch_array($query);
			//echo $result[2];
			//echo $sql;
			//exit;
			$nums = mysql_num_rows($query); 
while ($result_row = mysql_fetch_assoc($query)) {
	$str = substr($result_row['content'],0,10)."....";

    echo <<<TEXT
<div>
	<tr class="distr" >
			<td width="10%" align="center" valign="middle" class="font-hui">{$result_row['id']}</td>
                        <td width="20%" align="center" valign="middle" class="font-hui">{$result_row['title']}</td>
                        <td width="14%"  align="center" valign="middle" class="font-hui">{$str}</td>
						<td width="16%" align="center" valign="middle" class="font-hui">{$result_row['college_type_id']}</td>
						<td width="16%" align="center" valign="middle" class="font-hui">已发布</td>
						<td width="12%" align="center" valign="middle" class="font-hui">{$result_row['create_time']}</td>
						<td width="20%" align="center" valign="middle"><a href="newsedit.php?id={$result_row['id']}">编辑</a>
                        <a href="newsdelpro.php?id={$result_row['id']}" onclick="if(confirm('确实要删除此条记录吗？')) return submit();else return false;">删除</a>
						<input name="ID_Dele[]" type="checkbox" id="ID_Dele[]" value=""/>
						 </td>
						 </tr>
</div>
TEXT;
        }			
	?>	
	
<!--foreach($result as $key => $item):?>
<div><?php echo $item ;?></div>
					<tr class="distr" >
			<td width="14%" align="center" valign="middle" class="font-hui"><?php echo $item->id;?></td>
                        <td width="14%" align="center" valign="middle" class="font-hui"><?php echo $item->title;?></td>
                        <td width="16%" align="center" valign="middle" class="font-hui"><?php echo $item->content;?></td>
                        <!--<td width="16%" align="center" valign="middle" class="font-hui"><?php echo $item->producer;?></td>
						   <td width="16%" align="center" valign="middle" class="font-hui"><?php echo $item->name;?></td>
                        <td width="14%" align="center" valign="middle" class="font-hui">
						  <?php
                          switch ($item->college_type_id)
                         {
                           case 1:
                            echo "教程展示";
                            break;
                          case 2:
                            echo "剧本推荐";
                            break;
                         case 3:
                            echo "新闻资讯";
                            break;
						case 4:
                            echo "微传播计划";
                            break;
						case 5:
                            echo "客户端宣传页";
                            break;
						case 6:
                            echo "主题微电影计划";
                            break;
                         default:
                         }
                        ?></td>
                        <td width="16%" align="center" valign="middle" class="font-hui"><?php if($item->create­_time =='0')echo date('Y-m-d H:i:s');else echo date('Y-m-d H:i:s',$item->create_time);?></td>
						   <td width="8%" align="center" valign="middle" class="font-hui"><input type="checkbox" name="distr[]" value="<?php echo $item->video_id;?>">
						   <input type="hidden" name="time" value="<?php echo date('Y-m-d H:i:s');?>"/> </td>
					</tr>-->
                <?php //endforeach;?>
				</tbody>
			
			         <!-- <tr><td align="right">
					
                          <a href="newsedit.php">编辑</a>
                          <a href="edit.html">删除</a>
            
						<input type="hidden" name="time" value="<?php echo date('Y-m-d H:i:s');?>"/> 
						</td></tr>-->
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
            <!--<?php if($pageInfo['pages'] <= 1): ?>
                <p class="sysinfo">仅有当前一页</p>
            <?php else: ?>
                <!--<a class="mybutton ib" href="<?php echo $basicURL;?>&page=1">第一页</a>
                <?php 
                if($pageInfo['now'] == 1){
                    echo '<span class="mybutton ib"><img src="../img/ljt.gif" alt="" width="22" height="20" border="0" /></span>';
                }else{
                    echo '<a class="mybutton ib" href="'.$basicURL.'&page='.($pageInfo['now']-1).'"><img src="../img/ljt.gif" alt="" width="22" height="20" border="0" /></a>';
                }
                ?>
            <?php foreach($pageInfo['range'] as $item): ?>
            <?php 
            if($pageInfo['now'] == $item){
                echo '<span class="cur">'.$item.'</span>';
            }else{
                echo '<a class="ib mybutton" href="'.$basicURL.'&page='.$item.'">'.$item.'</a>';
            }
            ?>
            <?php endforeach; ?>
                <?php 
                if($pageInfo['now'] == $pageInfo['pages']){
                    echo '<span class="mybutton ib"><img src="../img/rjt.gif" alt="" width="22" height="20"  border="0"/></span>';
                }else{
                    echo '<a class="mybutton ib" href="'.$basicURL.'&page='.($pageInfo['now']+1).'"><img src="../img/rjt.gif" alt="" width="22" height="20"  border="0"/></a>';
                }
                ?>
                <!--<a class="mybutton ib" href="<?php echo $basicURL.'&page='.$pageInfo['pages']; ?>">最后页</a>
            <?php endif; ?>-->
            </div>
            <!--page end-->
		</div>
	  </div>
    <?php include('../common/admin_footer.html'); ?>
</body>
</html>	