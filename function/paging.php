<?php
header('Content-Type:text/html;charset=utf-8'); 
include('conn.php');
//分页函数
 function news($pageNum=1,$pageSize=4){ 
	 /*connnection();*/
	 // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
	 /*$rs="select * from news limit ".(($pageNum-1)*$pageSize).",".$pageSize;*/
	 $r=mysql_query("select * from news limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize);
	 if(mysql_num_rows($r)<1){
			 echo "<script>alert('没有新闻！');</script>";  
			 exit;
		  }
	 while($obj=mysql_fetch_assoc($r)){
		 $arr[]=$obj;
		 }
		 return $arr;
	 }
//显示总页数函数
   function allNews(){
	  /*connnection();*/
	   $rs="select count(*) num from news"; //可以显示出总页数
	   $r=mysql_query($rs);
	   $obj=mysql_fetch_assoc($r);
	   /*return $obj->num;*/
	   return $obj['num'];
	   }
	   
//搜索的分页函数
 function search($pageNum=1,$pageSize=4){ 
	 /*connnection();*/
	 // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
	 $search=$_GET['search'];
	 $r=mysql_query("select * from news where concat(id,',',title,',',time,',',reporter,',',checktype) like '%$search%' limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize);
	 if(mysql_num_rows($r)<1){
			 echo "<script>alert('搜不到新闻或新闻已被删除！');history.go(-1);</script>";  
			 exit;
		  }
	 while($obj=mysql_fetch_assoc($r)){
		 $arr[]=$obj;
		 }
		 return $arr;
	 }
//显示搜索的总页数函数
   function allsearch(){
	   /*connnection();*/
	   $search=$_GET['search'];
	   //可以显示出总页数
	   $rs="select count(*) num from news where concat(id,',',title,',',time,',',reporter,',',checktype) like '%$search%'"; 
	   $r=mysql_query($rs);
	   $obj=mysql_fetch_object($r);
	   return $obj->num;
	   }
//前端首页显示的分页函数
function show($pageNum=1,$pageSize=4){ 
	 /*connnection();*/
	 // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
	 /*$rs="select * from news limit ".(($pageNum-1)*$pageSize).",".$pageSize;*/
	 $r=mysql_query
	 ("select id,title,time,reporter,content,img from news where checktype='审核通过' limit "
	  . (($pageNum - 1) * $pageSize) . "," . $pageSize);
	 if(mysql_num_rows($r)<1){
			 echo "<script>alert('没有新闻！');</script>";  
			 exit;
		  }
	 while($obj=mysql_fetch_assoc($r)){
		 $arr[]=$obj;
		 }
		 return $arr;
	 }

//前端首页显示的总页面函数
   function allShow(){
	   /*connnection();*/
	   $rs="select count(id) num from news where checktype='审核通过'"; //可以显示出总页数
	   $r=mysql_query($rs);
	   $obj=mysql_fetch_object($r);
	   return $obj->num;
	   }

//前端搜索用函数
 function frontSearch($pageNum=1,$pageSize=4){ 
	 /*connnection();*/
	 // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
	 $search=$_GET['search'];
	 $r=mysql_query("select id,title,time,reporter,content,img from news where checktype='审核通过' and  	concat(id,',',title,',',time,',',reporter,',',content) like '%$search%' limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize);
	 if(mysql_num_rows($r)<1){
			 echo "<script>alert('搜不到新闻或新闻已被删除！');history.go(-1);</script>";  
			 exit;
		  }
	 while($obj=mysql_fetch_assoc($r)){
		 $arr[]=$obj;
		 }
		 return $arr;
	 }
//前端搜索显示总页数
   function frontAllSearch(){
	   /*connnection();*/
	   $search=$_GET['search'];
	   //可以显示出总页数
	   $rs="select count(*) num from news where checktype='审核通过' and concat(id,',',title,',',time,',',reporter,',',content) like '%$search%'"; 
	   $r=mysql_query($rs);
	   $obj=mysql_fetch_object($r);
	   return $obj->num;
	   }
?>