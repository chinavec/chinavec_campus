<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 20000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("./photo_wall/" . $_FILES["file"]["name"]))
      {
      echo "图片已存在 请修改名字重新上传";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "./photo_wall/" . $_FILES["file"]["name"]);
     $save= "/photo_wall/" . $_FILES["file"]["name"];
	   //echo $save;
      }
    }
  }
?>
<?php
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

	//接收数据
	require('lib/connect.php');
	$sql="select * from `photo_wall` where `id`='$validid'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	if($_POST['wechat']==''){
			$wechat = '';
			}else{
			$wechat = $_POST['wechat'];
				}
	if($_POST['qq']==''){
			$qq = '';
			}else{
			$qq = $_POST['qq'];
				}
	if(!isset($save)){
			$save = $row['photo_url'];
			}
	if($_POST['star']==''&&$row['star']==''){
			$star = ''; 
		}elseif($_POST['star']==''&&$row['star']!==''){
			$star = $row['star'];
			}else{
			$star = $_POST['star'];
				}
	if($_POST['blood']==''&&$row['blood_type']==''){
			$blood_type = ''; 
		}elseif($_POST['blood']==''&&$row['blood_type']!==''){
			$blood_type = $row['blood'];
			}else{
			$blood_type = $_POST['blood'];
				}
	if($_POST['Type']==''){
			$type = $row['photo_type_id']; 
		}else{
			$type = $_POST['Type'];
			}
	$name	 = $_POST["name"]		? $_POST['name']    : '';
	$mail 	 = $_POST["mail"]	        ? $_POST['mail']    : '';
	$dscrp 	 = $_POST["dscrp"]		? $_POST['dscrp']    : '';
	$time = $_POST["time"]		? $_POST['time']    : '';
	$mp = $_POST["mp"]		? $_POST['mp']    : '';
	//$type = $_POST["Type"]		? $_POST['Type']    : '';
	//echo $save;
	//echo $star;
	//echo $blood_type;
	//print_r($_POST);
	//exit;
	include('lib/connect.php');
	
	$sql = "UPDATE `chinavec`.`photo_wall` SET `name`='$name' ,`mail`='$mail' ,`photo_type_id`='$type',`abstract`='$dscrp' ,`mp`='$mp',`QQ`='$qq',`wechat`='$wechat',`photo_url`='$save',`create_time`='$time',`star`='$star',`blood_type`='$blood_type',`photo_type_id`='$type',`photo_url`='$save' WHERE `id`='$validid'"; 
	//echo $sql;
	//exit;
	if (mysql_query($sql,$conn))
	{	
		echo "<script type=\"text/javascript\">alert('信息编辑成功');</script>";
			echo "<script type=\"text/javascript\">window.location.href=\"photo.php\";</script>

?>";
		}
		else{
			echo "<script type=\"text/javascript\">alert('22信息录入失败');</script>";
			echo "<script type=\"text/javascript\">window.history.back(-1);</script>";
			}
		
		mysql_close($conn);

?>
</head>
</html>
