<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
      $photo= "../../chinavec_cd/campusadmin/material/photo/" . $_FILES["photo"]["name"];
      }
    }
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
      $file="../../chinavec_cd/campusadmin/material/video/" . $_FILES["video"]["name"];
	
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

    if (file_exists("material/audio/" . $_FILES["video"]["name"]))
      {
      echo "<script> alert('文件已存在，请重新选择');history.go(-1); </script>" ;
	  exit;
      }
    else
      {
      move_uploaded_file($_FILES["video"]["tmp_name"],
      "material/audio/" . $_FILES["video"]["name"]);
      $file="../../chinavec_cd/campusadmin/material/audio/" . $_FILES["video"]["name"];
      }
    }
  }

?>
<?php
	
	require('lib/connect.php');
	$validid = $_GET['id'];
	$sql="select * from `material` where `id`='$validid'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	if(!isset($photo)){
			$photo = $row['photo_url'];
			}
	if(!isset($file)){
			$file = $row['file_url'];
			}
	if($_POST['Type']==''){
			$Type = $row['material_type_id']; 
		}else{
			$Type = $_POST['Type'];
			}	
	//接收数据
	$title	 = $_POST["title"]		? $_POST['title']    : '';
	//$Type 	 = $_POST["Type"]	        ? $_POST['Type']    : '';
	$time 	 = $_POST["time"]		? $_POST['time']    : '';
	$abstract = $_POST["abstract"]		? $_POST['abstract']    : '';
	//echo $photo;
	//echo $file; 
	//exit;
	
	 $sql = "UPDATE `chinavec`.`material` SET `material_type_id`='$Type' ,`photo_url`='$photo',`file_url`='$file',`title`='$title' ,`abstract`='$abstract' ,`update_time`='$time' WHERE `id`='$validid'"; 
	//echo $sql;
	//exit;
	if (mysql_query($sql,$conn))
	{	
		echo "<script type=\"text/javascript\">alert('信息编辑成功');</script>";
			echo "<script type=\"text/javascript\">window.location.href=\"material.php\";</script>

?>";
		}
		else{
			echo "<script type=\"text/javascript\">alert('22信息录入失败');</script>";
			echo "<script type=\"text/javascript\">window.location.href=\"materialedit.php\";</script>";
			}

		mysql_close($conn);

?>
</html>
