<?php

  header("Content-type:text/html; charset=utf-8");

  $allowedExts = array("gif","jpeg","jpg","png");
  $temp = explode(".",$_FILES["file"]["name"]);
  echo $_FILES["file"]["size"];
  $extension = end($temp);

  if((($_FILES["file"]["type"] == "image/gif")
  || ($_FILES["file"]["type"] == "image/jpeg")
  || ($_FILES["file"]["type"] == "image/jpg")
  || ($_FILES["file"]["type"] == "image/pjpeg")
  || ($_FILES["file"]["type"] == "image/x-png")
  || ($_FILES["file"]["type"] == "image/png"))
  && ($_FILES["file"]["size"] < 204800)
  && in_array($extension, $allowedExts))
  {
    if($_FILES["file"]["error"] > 0 )
    {
      echo "Error : ". $_FILES["file"]["error"]."<br>";
    }
    else
    {
      echo "上传文件名: " . $_FILES["file"]["name"]."<br>";
      echo "文件类型: " . $_FILES["file"]["type"]."<br>";
      echo "文件大小: " . $_FILES["file"]["size"] / 1024 ."<br>";
      echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"]. "<br>";

      if(file_exists("upload/" . $_FILES["file"]["name"]))
      {
         echo $_FILES["file"]["name"]."文件已经存在!";
      }
      else
      {
        move_uploaded_file($_FILES["file"]["tmp_name"],"upload/". $_FILES["file"]["name"]);
        echo "文件存储在:" . "upload/" . $_FILES["files"]["name"];
      }
    }
  }
  else
  {
    echo "非法的文件格式!";
  }

 ?>
