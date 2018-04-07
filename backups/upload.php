<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<meta name="description" content="">
<meta name="author" content="">
<link  rel="stylesheet" type="text/css" href="../css/all.css">
<title>上传显示</title>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php
header('Content-Type:text/html;charset=utf-8');
date_default_timezone_set("PRC");                                        //设置中国时区
include('islogin.php') ;
if(count($_FILES)>0){
	$sort=array("image/jpeg","image/jpg","image/gif","image/png");       //用来验证图片类型的数组
	if(in_array($_FILES['img']['type'],$sort)){                          //判断上传的文件类型是否和数组中的类型匹配
		$img="img";                                                      //设置要上传到的文件夹位置
		if(!file_exists($img)){   mkdir("$img",0700);  }                 //判断是否存在这个文件夹，没有的话就创建一个		
		$time=date("Y_m_d_H_i_s");                                       //获取当前时间
		$file_name = explode(".",$_FILES['img']['name']);                //explode把上传图片的名字以"."为分割线打断转换为数组
		$file_name[0]=$time;                                             //把时间用来替换掉文件原名
		$name = implode(".",$file_name);                                 //implode重新把上传文件的名字数组以"."拼接回字符串
		$img_name = "img/".$name;                                        //给上传文件名字添加上目录前缀
		
	    if(move_uploaded_file($_FILES['img']['tmp_name'],$img_name)){   //move_uploaded_file 移动文件到指定目录$img_name下
			$_SESSION['img']=$img_name;                                 //把名字传给session方便提交表单                
			echo "<img class='framebox' src='$img_name'>
			<div class='canelbox'><a href='canelUpload.php' class='btn btn-sm btn-default'>取消上传</a></div>";
		}else {
		 	echo "<script>alert('上传的文件失败！');history.go(-1);</script>";		
		}
	}else{
		echo "<script>alert('上传的文件为空或不是图片类型！');</script>";	
	}
}
 ?>
</body>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</html>