<?php
include('islogin.php');
include('conn.php');
header('Content-Type:text/html;charset=utf-8');
//增加新闻用函数
function addData($title,$date,$reporter,$content,$img){
	$sql="insert into news(title,time,reporter,content,checktype,img)values
			('$title','$date','$reporter','$content','没有审核','$img')";
	if(mysql_query($sql)){
		unset($_POST);
		echo "<script>alert('添加新闻成功！');history.go(-1);</script>";
	}else{
		unset($_POST);
		echo "<script>alert('添加新闻失败！');history.go(-1);</script>";
	}
}
//上传图片相关函数
function uploadPic(){
if($_FILES['img']['name']!==""&&$_FILES['img']['name']!==null){
	$img_name =uploadname();
	if(move_uploaded_file($_FILES['img']['tmp_name'],$img_name)){ //移动文件到指定目录$img_name下
			return $img_name;
	}else{
		echo "<script>alert('图片上传失败！');history.go(-1);</script>";
	}
}
}
//检查新闻是否存在后添加新闻的函数
function Datacheck($title,$date,$reporter,$content,$img){
	$title=htmlspecialchars($title);
	$date=str_replace("T"," ",$date);
	$reporter=htmlspecialchars($reporter);
	$content=htmlspecialchars($content);	
	$sql="select id from news where title='$title' or content='$content'";
	$mq=mysql_query($sql);
	if(mysql_num_rows($mq)<1){
		addData($title,$date,$reporter,$content,$img);
	}else{
		unset($_POST);
		echo "<script>alert('这个新闻已经存在！');history.go(-1);</script>";
	}
}
?>