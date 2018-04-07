<?php
include('islogin.php');
header('Content-Type:text/html;charset=utf-8'); 
//删除新闻用函数
function deleteData($id){
	$mq=mysql_query("select img from news where id='$id'");
	$src = mysql_fetch_object($mq);
	$img=$src->img;     //获得图片路径
	
	$sql="delete from news where id='$id'";
	mysql_query("SET AUTOCOMMIT=0");//设置为不自动提交查询
	if($img!==""&&$img==null){				//检测删除的新闻是否带图片
		if(!mysql_query($sql)||unlink($img)){
	  		unset($_POST);
			mysql_query("rollback"); //回滚，不删除	
			echo "<script>alert('删除失败！')</script>";	 
		}else{
			mysql_query("COMMIT"); //执行
		}
	}else{
		if(!mysql_query($sql)){
			unset($_POST);
			mysql_query("rollback"); //回滚，不删除	
			echo "<script>alert('删除失败！')</script>";
		}else{
			mysql_query("COMMIT"); //执行
		}
	}
}
 ?>