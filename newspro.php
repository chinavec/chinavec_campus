<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

	$title	 = $_POST["title"]		? $_POST['title']    : '';
	$Type 	 = $_POST["Type"]	        ? $_POST['Type']    : '';
	$time 	 = $_POST["time"]		? $_POST['time']    : '';
	$content = $_POST["content"]		? $_POST['content']    : '';
	
	require('lib/connect.php');
	
	 $sql = "INSERT INTO `chinavec`.`college` (`college_type_id` ,`title` ,`content` ,`create_time` ) VALUES ('$Type' ,'$title' ,'$content' ,'$time');"; 
	//echo $sql;
	//exit;
	if (mysql_query($sql,$conn))
	{	
		echo "<script type=\"text/javascript\">alert('信息录入成功');</script>";
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
