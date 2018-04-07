<!doctype html>
<?php include('function/islogin.php'); ?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<meta name="description" content="">
<meta name="author" content="">
<link  rel="stylesheet" type="text/css" href="css/all.css" >
<title>首页</title>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
<div class="navbar-header">
<p class="navbar-brand">欢迎，用户<?php echo $_SESSION['name'];  ?></p>
 <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
    <li><a href="frontIndex.php">前台首页</a></li>
    <li><a href="addnews.php" target="news">添加新闻</a></li>
    <li><a href="viewnews.php" target="news">查看新闻</a></li>
    <li><a href="function/out.php">登出</a></li>
    </ul>
 </div><!--navbar -->
</div><!--class="navbar-header"-->
</div><!--class="container"-->
</nav><!--class="navbar navbar-inverse navbar-fixed-top"-->
<!--<div class="embed-responsive embed-responsive-16by9"> -->
<!-- iframe class="class="embed-responsive-item""-->
<iframe name="news" class="iframe" />
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>