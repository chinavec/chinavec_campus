<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

	require('lib/connect.php');
	$validid = $_GET['id'];
	$sql="select * from `college` where `id`='$validid'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);	
	//接收数据
	if($_POST['Type']==''){
			$Type = $row['college_type_id']; 
		}else{
			$Type = $_POST['Type'];
			}
	$title	 = $_POST["title"]		? $_POST['title']    : '';
	//$Type 	 = $_POST["Type"]	        ? $_POST['Type']    : '';
	$time 	 = $_POST["time"]		? $_POST['time']    : '';
	$content = $_POST["content"]		? $_POST['content']    : '';
	//print_r($_POST);
	//echo $Type;
	//exit;
	
	
	 $sql = "UPDATE `chinavec`.`college` SET `college_type_id`='$Type' ,`title`='$title' ,`content`='$content' ,`create_time`='$time' WHERE `id`='$validid'"; 
	//echo $sql;
	//exit;
	if (mysql_query($sql,$conn))
	{	
		echo "<script type=\"text/javascript\">alert('信息编辑成功');</script>";
			echo "<script type=\"text/javascript\">window.location.href=\"index.php\";</script>

?>";
		}
		else{
			echo "<script type=\"text/javascript\">alert('22信息录入失败');</script>";
			echo "<script type=\"text/javascript\">window.location.href=\"newsadd.php\";</script>";
			}
		

		mysql_close($conn);

		
?>
</html>
