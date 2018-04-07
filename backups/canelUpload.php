<?php
include('../function/islogin.php');
header('Content-Type:text/html;charset=utf-8'); 
if(isset($_SESSION['img'])&&$_SESSION['img']!==null){
	$file=$_SESSION['img'];	
	if (!unlink($file)){
  		echo ("取消上传路径出错");
    }else{
		unset($_SESSION['img']);
  		echo "<script>alert('取消上传成功，文件已被删除！');</script>";
    } 
	
}else{
   echo "<script>alert('不能直接进入此界面！');history.go(-1);</script>";
	}
?>