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
      echo $_FILES["file"]["name"] . " already exists. ";
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
else
  {
  echo "Invalid file";
  }
?>
<?php

	//接收数据

	$name 	 = $_POST["name"]	        ? $_POST['name']    : '';
	$mail 	 = $_POST["mail"]		? $_POST['mail']    : '';
	$dscrp = $_POST["dscrp"]		? $_POST['dscrp']    : '';
	$time = $_POST["time"]		? $_POST['time']    : '';
	$type = $_POST["Type"]		? $_POST['Type']    : '';
	$mp = $_POST["mp"]		? $_POST['mp']    : '';
	$star = $_POST["star"]		? $_POST['star']    : '';
	$blood = $_POST["blood"]		? $_POST['blood']    : '';
	$qq = $_POST["qq"]		? $_POST['qq']    : '';
	$wechat = $_POST["wechat"]		? $_POST['wechat']    : '';

	require('lib/connect.php');
	
	 $sql = "INSERT INTO `chinavec`.`photo_wall` (`name` ,`mail` ,`abstract` ,`create_time`,`photo_url`,`photo_type_id`,`mp`,`star`,`blood_type`,`QQ`,`wechat` ) VALUES ('$name' ,'$mail' ,'$dscrp' ,'$time','$save','$type','$mp','$star','$blood','$qq','$wechat');"; 
	//echo $sql;
	//exit;
	if (mysql_query($sql,$conn))
	{	
		echo "<script type=\"text/javascript\">alert('信息录入成功');</script>";
			echo "<script type=\"text/javascript\">window.location.href=\"photo.php\";</script>

?>";
		}
		else{
			echo "<script type=\"text/javascript\">alert('22信息录入失败');</script>";
			echo "<script type=\"text/javascript\">window.location.href=\"photoadd.php\";</script>";
			}

		mysql_close($conn);


?>
</head>
</html>
