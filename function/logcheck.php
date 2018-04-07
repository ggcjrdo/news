<?php
header('Content-Type:text/html;charset=utf-8'); 
session_start();
if(isset($_SESSION['name'])&&$_SESSION['name']!==null){	
	header("Location: http://localhost/news/index.php");	
}else if($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['login'])&&$_POST['login']=="登 陆"){
	include('conn.php');
	$name=$_POST['name'];
	$password=$_POST['password'];
	$login="select id from user where name='$name' and password='$password'";
	if(mysql_query($login)){
		$_SESSION['name']=$name;
		echo "<script>alert('登陆成功，跳转入首页...');parent.location.href='http://localhost/news/index.php'; </script>";	
    }else {
		echo "<script>alert('用户名或密码错误！');history.go(-1);</script>";	
	}
	}/*if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['login']=="登 陆")*/


?>