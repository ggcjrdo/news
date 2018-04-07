<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
<title>查看新闻</title>
<script src="css/jquery-3.1.1.min.js"></script>
<script src="css/formcheck.js"></script>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
<!--<div id="myDiv"><h2>使用 AJAX 修改该文本内容</h2></div>-->
<?php
header('Content-Type:text/html;charset=utf-8'); 
include('function/paging.php');	  
	@$allNum = allNews();
    @$pageSize = 4; //约定每一页显示几条信息
    @$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
    @$endPage = ceil($allNum/$pageSize); //总页数
    @$array = news($pageNum,$pageSize);
?>
<?php
include('function/delete.php'); 
if($_SERVER['REQUEST_METHOD']=="POST"&&$_POST['hidden']=="buttonclick"){
	unset($_POST['hidden']);/*echo print_r($_POST);*/
	foreach($_POST as $id=>$value){
		deleteData($id);	      
	 }
	  echo "<script>alert('删除成功！');</script>";
	  unset($_POST);
}
?>	
<div class="container" role="main">
<br>
   <div class="input-group">
      <form method="GET" action="searchnews.php" onSubmit="return newsSearch()">
      <input id="text" type="text" placeholder="Search for..." size="145" name="search">
      <div class="btn-group btn-group-sm" role="group">
        <input class="btn btn-primary" type="submit" value="搜索新闻">
      </div><!-- btn btn-default -->
      </form>
   </div><!-- /input-group -->
   
<div class="row">
<div class="col-md-12">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table class="table table-striped">
<thead>
<tr>
    <th></th>
	<th>id</th>
    <th>标题</th>
    <th>时间</th>
    <th>作者</th>
    <th>操 作</th>
    <th>审核状态</th>
</tr>
</thead>
<tbody>
<?php
    foreach($array as $key=>$value){
?>
<tr>
	<td><input type="checkbox" name="<?php echo $value['id'];?>"></td>
    <td><input type="hidden" name="hidden" value="buttonclick"><?php echo $value['id'];?></td>
    <td><a href="concretenews.php?action=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a></td>
    <td><?php echo $value['time']; ?></td>
    <td><?php echo $value['reporter']; ?></td>
    <td><input type="submit" name="<?php echo $value['id']; ?>" value="删除" class="btn btn-danger btn-sm"></td>
    <td>
		<select id="<?php echo $x; ?>" onchange="changecheck(this.id,this.value)">
			<option selected="selected">-<?php echo $value['checktype']; ?>-</option>
			<option value=" ">-----------</option>
			<option value="没有审核">没有审核</option>
			<option value="正在审核">正在审核</option>
			<option value="审核通过">审核通过</option>
			<option value="审核失败">审核失败</option>
		</select>
	</td>
</tr>
<?
    }	//echo print_r($_POST);
?>
</tbody>
</table>
<input type="submit" value="批量删除" class="btn btn-danger btn-xs">
</form>
<!--</div> -->
<nav aria-label="Page navigation">
  <ul class="pagination">
    <li><a href="?pageNum=1">首页</a></li>
    <li>
      <a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>" aria-label="Previous">
        <span aria-hidden="true">上一页</span>
      </a>
    </li>
    <li>
      <a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>" aria-label="Next">
        <span aria-hidden="true">下一页</span>
      </a>
    </li>
    <li><a href="?pageNum=<?php echo $endPage;?>">尾页</a></li>
  </ul>
</nav><!-- aria-label="Page navigation"-->
</div><!--col-md-10 -->
</div><!-- row-->
</div><!--container theme-showcase role="main" -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
