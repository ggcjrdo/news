<!doctype html>
<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8">
<title>测试</title>
</head>

<body>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	echo str_replace("T"," ",$_POST['date'])."<br>";
	echo $_POST['date']."】<br>";
	$text=$_POST['date'];
	echo "<input name='time' type='datetime-local' value='$text'><br>";
}
 ?>
</body>
</html>