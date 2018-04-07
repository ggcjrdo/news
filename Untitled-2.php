<!doctype html>
<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8">
<title>测试</title>
</head>
<script>
function check(){
	var date=document.getElementById("date");
	
	if(date.value==""){
		alert("日期不能为空！");
		date.focus();
		return false;
	}	
}
</script>
<body>
<form action="timetext.php" method="post" onSubmit="return check()">
<?php
date_default_timezone_set("PRC");                                    //设置中国时区
echo "<input name='date' type='datetime-local' id='date'><br>";
echo date("Y-m-d H:i:s")."<br>";
echo date("Y/m/d H:i")."<br>";

function text($x,$y){
	if($x>$y){return 1;}
	if($x<$y){return 2;}
	}
if(text(1,2)==1){
	echo text(1,2);}else{echo 2;};
 ?>
 <input type="submit">
</form>

</body>
</html>