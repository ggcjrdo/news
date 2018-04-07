<?php
 include('islogin.php');
 header('Content-Type:text/html;charset=utf-8'); 
  if($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST["add"])&&$_POST["add"]=="添 加"){
	      include('conn.php');
		  $title=$_POST["title"];
		  $time=$_POST["date"];
		  $reporter=$_POST["reporter"];
		  $content=$_POST["content"];
		  $img=$_SESSION['img'];
		  $r=mysql_query("select id from news where title='$title' or content='$content'");
	  if(mysql_num_rows($r)<1){
		  $sql=
			"insert into news(title,time,reporter,content,img)values('$title','$time','$reporter','$content','$img')";
	     if(mysql_query($sql)){

			 echo "<script>alert('添加新闻成功！');parent.location.href='index.php';</script>";
			 unset($_POST["add"]);
			 }else{
			 echo "<script>alert('添加新闻失败！');parent.location.href='index.php';</script>";
			 unset($_POST["add"]);
			 }
	  }/*mysql_num_rows($r)<1 */
	  else{ 
		  echo "<script>alert('这个新闻已经存在！');history.go(-1);</script>";}
	  } 
?>