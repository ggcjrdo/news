<!doctype html>
<?php 
header('Content-Type:text/html;charset=utf-8');
if($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST["add"])&&$_POST["add"]=="添 加"){
	include('function/add.php');  	   		  
	$img=uploadPic();
	Datacheck($_POST["title"],$_POST['date'],$_POST["reporter"],$_POST["content"],$img);
	} 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<meta name="description" content="">
<meta name="author" content="">
<title>添加新闻</title>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link  rel="stylesheet" type="text/css" href="css/all.css" >
<script type="text/javascript" src="css/formcheck.js"></script>
<script type="text/javascript" src="css/placeImage.js"></script>
<script src="css/jquery-3.1.1.min.js"></script>
<script>
function cancelFile(){
	var pic = document.getElementById("preview");
	var file = document.getElementById("img");
	file.value="";
	pic.src="";
	<!--alert("取消图片选择");-->
	}
$(document).ready(init);
function init() {
	$(".right").mouseenter(function () {
		$(this).find(".delete").show();
    });
    $(".right").mouseleave(function () {
		$(this).find(".delete").hide();
	}); 
}
</script>
</head>
<body>
<div class="left">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
  method="post" enctype="multipart/form-data" onSubmit="return addcheck()" >
<div class="input-group"><span class="input-group-addon">标 题</span>
<input id="title" name="title" type="text"  placeholder="请输入标题" class="form-control"></div>
<p><span id="titleinfo" class="label label-danger" /></p>
<br>

<div class="input-group"><span class="input-group-addon">日 期</span>
<input id="date" name="date" type="datetime-local" class="form-control"></div>
<p><span id="dateinfo" class="label label-danger" /></p><br>

<div class="input-group"><span class="input-group-addon">作 者</span>
<input id="reporter" name="reporter" type="text" size="30" placeholder="请输入作者名" class="form-control"></div>
<p><span id="repoinfo" class="label label-danger" /></p><br>

<div class="input-group"><span class="input-group-addon">图 片</span>
<input id="img" name="img" type="file" class="form-control" onchange="return change()" /></div>
<p class="help-block"><span id="show">&nbsp;***如要添加图片，请选择/.jpg/.jpeg或者.png的图片文件***</span></p>

<div class="input-group"><span class="input-group-addon">内 容</span>
<textarea id="content" name="content"  class="form-control" rows="6"></textarea></div>
<p><span id="contentinfo" class="label label-danger" /></p><br>

<center><input name="add" type="submit" value="添 加" class="btn btn-sm btn-primary"></center>
</form>
</div>
<!--<iframe class="filebox" name="myfile"></iframe>-->
<div class="right">
<img id="preview" alt="" name="pic" class="img" />
<a href="#"><img src="img/delete.png" class="delete" onClick="cancelFile()" /></a>
</div>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>