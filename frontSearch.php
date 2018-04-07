<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<meta name="description" content="">
<meta name="author" content="">
<title>前端搜索结果</title>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="css/formcheck.js"></script>
</head>

<body>
<?php
	header('Content-Type:text/html;charset=utf-8');
	include('function/paging.php');
	if($_SERVER['REQUEST_METHOD']=="GET"&&isset($_GET['search'])){
		$_SESSION['search']=$_GET['search'];	
	}
	@$allNum = frontAllSearch();
    @$pageSize = 4; //约定每一页显示几条信息
    @$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
    @$endPage = ceil($allNum/$pageSize); //总页数
    @$array = frontSearch($pageNum,$pageSize);		
?>
<div class="navbar-wrapper">
	<div class="container">
		<nav class="navbar navbar-inverse navbar-static-top">
        	<a class="navbar-brand" href="#">新闻网</a>
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
<hr class="featurette-divider">
<?php
foreach($array as $key=>$value){
	$showid=$value['id'];
	$showimg=$value['img'];
	echo "<div class='row featurette'>";
	echo "<div class='col-md-7 col-md-push-5'>";
	echo "<h2 class='featurette-heading'>
		  <a href='http://localhost/news/frontConcrete.php?id=$showid'>".$value['title']."</a></h2>";
	echo "<strong>".$value['time']."&nbsp;&nbsp;作者:".$value['reporter']."</strong><br><br>";
	echo "<p class='lead'>";

    if(strlen($value['content'])>300){
	echo mb_strcut($value['content'],0,300,'utf-8')."......</p>";
	}else{
	echo $value['content']."</p>";
	}
	echo "</div>";
	echo "<div class='col-md-5 col-md-pull-7'>";
	echo "<img class='featurette-image img-responsive center-block' src='$showimg'>";
	echo "</div></div>";
	echo "<hr class='featurette-divider'>";
}
 ?> 
  
<nav aria-label="Page navigation">
  <ul class="pagination">
    <li><a href="?search=<?php echo $_SESSION['search']?>&&pageNum=1">首页</a></li>
    <li>
    	<a href="?search=<?php echo $_SESSION['search']?>&&pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">
      	<span aria-hidden="true">上一页</span>
   	  	</a>
    </li>
    <li>
    	<a href="?search=<?php echo $_SESSION['search']?>&&pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>" >
        <span aria-hidden="true">下一页</span>
      	</a>
    </li>
    <li><a href="?search=<?php echo $_SESSION['search']?>&&pageNum=<?php echo $endPage?>">尾页</a></li>
  </ul>
</nav><!-- aria-label="Page navigation"-->

</div><!--class="container marketing"-->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>