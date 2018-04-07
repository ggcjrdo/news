<?php
header('Content-Type:text/html;charset=utf-8'); 
 $con=mysql_connect("localhost:3306","root","");
 if(!$con){
	 die('Could not connect:'.mysql.error());
	 }
  mysql_select_db("news",$con);
  mysql_query("set names 'UTF8'");

//连接数据库函数
function connnection(){
 $con=mysql_connect("localhost:3306","root","");
 if(!$con){
	 die('Could not connect:'.mysql.error());
	 }
  mysql_select_db("news",$con);
  mysql_query("set names 'UTF8'");
}
//遍历新闻内容函数
function showData($sql){
	$show=mysql_query($sql);
	if(mysql_num_rows($show)<1){
		return 0;
		echo "<script>alert('不存在这条新闻！');history.go(-1);</script>";
	}else{
		while($obj=mysql_fetch_assoc($show)){
			$arr[]=$obj;
		}
	return $arr;
	}
}
//设置上传图片名字的函数
function uploadname(){
	$img="img";
	if(!file_exists($img)){mkdir("$img",0700);}
	$time=date("Y_m_d_H_i_s");                                   //获取当前时间
	$file_name = explode(".",$_FILES['img']['name']);            //上传图片的名字以"."为分割线打断转换为数组
	$file_name[0]=$time;                                         //把时间用来替换掉文件原名
	$name = implode(".",$file_name);                             //重新把上传文件名字数组以"."拼接回字符串
	$img_name = "img/".$name;
	return $img_name;
}
?>
