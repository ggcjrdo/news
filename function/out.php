<?php
session_start();
header('Content-Type:text/html;charset=utf-8'); 
if(isset($_SESSION['name'])&&$_SESSION['name']!==null){
include('conn.php');
session_destroy();
if (count($_POST) > 0) {
   $_POST = array();
}
mysql_close($con);
echo "<script> alert('登出成功，跳转到登陆页面...');parent.location.href='http://localhost/news/login.php'; </script>"; 
}else{
	echo "<script> alert('你还没登录，请先登录');parent.location.href='http://localhost/news/login.php'; </script>";
	}
 ?>
