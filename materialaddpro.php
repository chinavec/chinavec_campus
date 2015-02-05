<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//print_r($_FILES);
//exit;
if ((($_FILES["photo"]["type"] == "image/gif")
|| ($_FILES["photo"]["type"] == "image/jpeg")
|| ($_FILES["photo"]["type"] == "image/jpg")
|| ($_FILES["photo"]["type"] == "image/pjpeg"))
&& ($_FILES["photo"]["size"] < 2000000000))
  {
  if ($_FILES["photo"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["photo"]["error"] . "<br />";
    }
  else
    {
    //echo "Upload: " . $_FILES["photo"]["name"] . "<br />";
    //echo "Type: " . $_FILES["photo"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["photo"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["photo"]["tmp_name"] . "<br />";

    if (file_exists("material/photo/" . $_FILES["photo"]["name"]))
      {
      echo "<script> alert('文件已存在，请重新选择');history.go(-1); </script>" ;
	  exit;
      }
    else
      {
      move_uploaded_file($_FILES["photo"]["tmp_name"],
      "./material/photo/" . $_FILES["photo"]["name"]);
      $photo= "../../chinavec_campus/material/photo/" . $_FILES["photo"]["name"];
      }
    }
  }
else
  {
  echo "<script> alert('无效的文件，请重新选择');history.go(-1); </script>" ;
  exit;
  }
?>
<?php
if (($_FILES["video"]["type"] == "video/rmvb")
||($_FILES["video"]["type"] == "video/mp4")
||($_FILES["video"]["type"] == "video/mpg")
||($_FILES["video"]["type"] == "application/octet-stream")
||($_FILES["video"]["type"] == "video/x-ms-wmv"))
  {
  if ($_FILES["video"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["video"]["error"] . "<br />";
    }
  else
    {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("material/video/" . $_FILES["video"]["name"]))
      {
      echo "<script> alert('文件已存在，请重新选择');history.go(-1); </script>" ;
	  exit;
      }
    else
      {
      move_uploaded_file($_FILES["video"]["tmp_name"],
      "material/video/" . $_FILES["video"]["name"]);
      $file="../../chinavec_campus/material/video/" . $_FILES["video"]["name"];
      }
    }
  }
elseif(($_FILES["video"]["type"] == "audio/mp3")
|| ($_FILES["video"]["type"] == "audio/wav")
|| ($_FILES["video"]["type"] == "audio/aac"))
  {
  if ($_FILES["video"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["video"]["error"] . "<br />";
    }
  else
    {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("material/music/" . $_FILES["video"]["name"]))
      {
      echo "<script> alert('文件已存在，请重新选择');history.go(-1); </script>" ;
	  exit;
      }
    else
      {
      move_uploaded_file($_FILES["video"]["tmp_name"],
      "material/audio/" . $_FILES["video"]["name"]);
      $file="../../chinavec_campus/material/music/" . $_FILES["video"]["name"];
      }
    }
  }
else
  {
  echo "<script> alert('无效的文件，请重新选择');history.go(-1); </script>" ;
  exit;
  }
  ?>
<?php
	//接收数据
	$title	 = $_POST["title"]		? $_POST['title']    : '';
	$Type 	 = $_POST["Type"]	        ? $_POST['Type']    : '';
	$time 	 = $_POST["time"]		? $_POST['time']    : '';
	$abstract = $_POST["abstract"]		? $_POST['abstract']    : '';
	require('lib/connect.php');
	
	$sql = "INSERT INTO `chinavec`.`material` (`material_type_id` ,`title` ,`abstract` ,`create_time`,`photo_url`,`file_url` ) VALUES ('$Type' ,'$title' ,'$abstract' ,'$time','$photo','$file');"; 
	if (mysql_query($sql,$conn))
	{	
		echo "<script type=\"text/javascript\">alert('素材录入成功');</script>";
			echo "<script type=\"text/javascript\">window.location.href=\"material.php\";</script>

?>";
		}
		else{
			echo "<script type=\"text/javascript\">alert('22素材录入失败');</script>";
			echo "<script type=\"text/javascript\">window.location.href=\"materialadd.php\";</script>";
			}

		mysql_close($conn);


?>
</html>
