<?php
include('islogin.php');
include('conn.php');
header('Content-Type:text/html;charset=utf-8'); 
//遍历详细新闻信息  
$id=$title=$time=$repo=$check=$content=$check="";
foreach($_GET as $x=>$x_value){
	/*echo $x." and ".$x_value;*/
	$concrete="select * from news where id=$x_value"; 
	$show=showData($concrete);
	if($show!==0){
		foreach($show as $key=>$row){
			$id=$row['id'];
			$title=$row['title'];
			$time=$row['time'];
			$repo=$row['reporter'];
			$content=$row['content'];
			$check=$row['checktype'];
			$_SESSION['img']=$row['img'];
		}
	}
}

//更改图片函数
function fixPic(){
if($_FILES['img']['name']!==""&&$_FILES['img']['name']!==null){
	$img_name =uploadname();
	if(move_uploaded_file($_FILES['img']['tmp_name'],$img_name)){ //移动文件到指定目录$img_name下
		if(isset($img)&&$img!==null&&$img!==""){
			unlink($_SESSION['img']);                            //如果有修改，删除原本的图片
			unset($_SESSION['img']);
		}
			return $img_name;
	}else{
		echo "<script>alert('图片上传失败！');history.go(-1);</script>";
	}
}else{
	return $_SESSION['img']; //如果没有点击上传图片修改就维持原本的图片途径
	}	
}

//修改新闻用函数
function fixData($id,$title,$date,$reporter,$content,$img){
$title=htmlspecialchars($title);
$date=str_replace("T"," ",$date);
$reporter=htmlspecialchars($reporter);
$content=htmlspecialchars($content);	
$sql="update news set title='$title',time='$date',reporter='$reporter',content='$content',checktype='正在审核',img='$img' where id='$id'";	
if(mysql_query($sql)){
	unset($_SESSION['img']);
	echo "<script> alert('修改成功!');history.go(-1);</script>";	
}else{
	echo "<script>alert('修改失败！');history.go(-1);</script>";	
}
}
?>