<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	include('lib/connect.php');

	if (isset($_GET['id'])) {
			$validid = $_GET['id'];
			require('lib/connect.php');
	 		$sql = "DELETE FROM `photo_wall` WHERE `id`='$validid'"; 
			//echo $sql;
			//exit;
			if (mysql_query($sql,$conn))
			{	
		        echo "<script type=\"text/javascript\">alert('信息删除成功');</script>";
			echo "<script type=\"text/javascript\">window.location.href=\"photo.php\";</script>
?>";
			}
			else{
			echo "<script type=\"text/javascript\">alert('22信息删除失败');</script>";
			echo "<script type=\"text/javascript\">window.location.href=\"photo.php\";</script>";
		}
	}elseif(isset($_POST['ID_Dele'])){
			$ID_Dele= implode(",",$_POST['ID_Dele']);
			$sql="delete from `photo_wall` where id in ($ID_Dele)";
			//echo $sql;
			//exit;
				if (mysql_query($sql,$conn))
				{	
				echo "<script type=\"text/javascript\">alert('信息删除成功');</script>";
				echo "<script type=\"text/javascript\">window.location.href=\"photo.php\";</script>

?>";
				}
				else{
				echo "<script type=\"text/javascript\">alert('22信息删除失败');</script>";
				echo "<script type=\"text/javascript\">window.location.href=\"photo.php\";</script>";
				}
			}
		mysql_close($conn);
	

?>
</html>
