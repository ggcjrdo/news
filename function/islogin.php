<?php
session_start();
header('Content-Type:text/html;charset=utf-8'); 
if(!isset($_SESSION['name'])||$_SESSION['name']==null){
	/*echo "<script>alert('没有登陆无法进入！'); history.go(-1);</script>";*/
	echo "<script>alert('没有登陆，正在跳转入登陆界面...');parent.location.href='http://localhost/news/login.php'; </script>";
	}
 ?>