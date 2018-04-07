<?php
 include('islogin.php');
 header('Content-Type:text/html;charset=utf-8'); 
 
 if(isset($_POST['id'])&&$_POST['id']!==null&&isset($_POST['type'])&&$_POST['type']!==null){
 	include('conn.php');
 	$id=$_POST['id'];
 	$type=$_POST['type'];
  	/*echo "号码为【".$id."】 and 状态【".$type."】";*/
	$check="update news set checktype='$type' where id='$id'";
 	if(!mysql_query($check)){
	 echo "更新状态出错!";
    }
 }else{
	 echo "<script>alert('不能直接进入！');history.go(-1);</script>";
	 }
 ?>