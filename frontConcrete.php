<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<meta name="description" content="">
<meta name="author" content="">
<title>前端详细新闻</title>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style>
pre{
	border:none;
	letter-spacing:0px;
	line-height:20px;
	overflow-x:hidden;
	overflow-y:hidden;
	word-wrap: break-word;
	white-space: pre-wrap;
}
</style>
</head>

<body>
<div class="navbar-wrapper">
	<div class="container">
		<nav class="navbar navbar-inverse navbar-static-top">
        	<a class="navbar-brand">新闻网</a>
            	<div id="navbar" class="navbar-collapse collapse">
              		<ul class="nav navbar-nav">
                		<li><a href="http://localhost/news/frontIndex.php">首页</a></li>
                		<li><a href="http://localhost/news/login.php">后台系统</a></li>
              		</ul>
            	</div>
        </nav>
	</div><!--class="container"-->
</div><!--class="navbar-wrapper"-->

<div class="container marketing"> 
<!-- START THE FEATURETTES -->
<hr class="featurette-divider">
<?php
 include('function/conn.php');
 if(isset($_GET['id'])&&$_GET['id']!==null){
 	$id=$_GET['id'];
 }else{$id="";}
 $title=$time=$reporter=$content=$img="";
 $result=mysql_query("select * from news where id='$id'");
 while($row = mysql_fetch_assoc($result)){
	 $title=$row['title'];
	 $time=$row['time'];
	 $reporter=$row['reporter'];
	 $content=$row['content'];
	 /*$content=str_replace("”","<br>",$row['content']);*/
	 $img=$row['img'];
	 }
 ?>
	<h1><?php echo $title; ?></h1>
    <p class="lead"><?php echo "时间:".$time."&nbsp;&nbsp;记者:".$reporter; ?></p>
    <div class="row">
    
    	<div class="col-md-9">   
        	<div class="col-md-12">
            	<img class="featurette-image img-responsive center-block" src="<?php echo $img; ?>">
            </div>
        	<div class="col-md-12"><br>
            <pre><?php echo  $content; ?></pre>
            </div>
        </div><!-- class="col-md-9" -->
        
        <div class="col-md-3">
        	<blockquote>
          	<div class="sidebar-module">
            	<h4>其 他 新 闻</h4>
            		<ol class="list-unstyled">
				<?php 
                    $other="select id,title from news where checktype='审核通过'
					 and id >= (select floor(RAND() * (select MAX(id) from news))) ORDER BY id LIMIT 5";
					 $otherdeal=mysql_query($other);
					 while($line = mysql_fetch_assoc($otherdeal)){
						 $lineid=$line['id'];
						 $linetitle=$line['title'];
						 if($id!==$lineid){
						 	echo "<li><a href='http://localhost/news/frontConcrete.php?id=$lineid'>$linetitle</a></li><br>";
						 }
						 }
					?>
            		</ol>
          	</div><!--class="sidebar-module"-->
         	</blockquote>
        </div><!--class="col-md-3 col-sm-offset-0" -->
     </div><!-- /.row -->  
         
      <hr>
      <footer>
      <center><a href="javascript:scroll(0,0)">返回顶部</a></center><br>
    </footer>
	
</div><!--class="container marketing"-->

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>