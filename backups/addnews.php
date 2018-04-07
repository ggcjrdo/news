<!doctype html>
<?php include('function/add.php'); ?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<meta name="description" content="">
<meta name="author" content="">
<link  rel="stylesheet" type="text/css" href="css/all.css" >
<title>添加新闻</title>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="css/formcheck.js"></script>
</head>
<body>
<div class="left">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" onSubmit="return addcheck()">
<div class="input-group"><span class="input-group-addon" id="basic-addon1">标 题</span>
<input type="text" id="title" name="title"  placeholder="请输入标题" class="form-control"></div>
<p><span id="titleinfo" class="label label-danger" /></p>
<br>

<div class="input-group"><span class="input-group-addon" id="basic-addon1">日 期</span>
<input type="date" disabled="disabled" value="<?php echo date("Y-m-d") ?>" class="form-control"></div><br>

<div class="input-group"><span class="input-group-addon" id="basic-addon1">作 者</span>
<input type="text" id="reporter" name="reporter" size="30" placeholder="请输入作者名" class="form-control"></div>
<p><span id="repoinfo" class="label label-danger" /></p>
<br>

<div class="input-group"><span class="input-group-addon" id="basic-addon1">内 容</span>
<textarea id="content" name="content"  class="form-control" rows="6"></textarea></div>
<p><span id="contentinfo" class="label label-danger" /></p>
<br>
<center><input type="submit" name="add" value="添 加" class="btn btn-sm btn-primary"></center>
</form>
</div>
<div class="right">
<form name="form" method="post" enctype="multipart/form-data">
<label>添加图片</label>
<input type="file" name="img" />
<p class="help-block">请选择/.jpg/.jpeg/.gif或者.png的图片文件
<input type="submit" value="上传" class="btn btn-sm btn-default"/>
</p>
</form>
<?php
include('function/upload.php');
 ?>
</div>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>