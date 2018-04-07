<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<script src="css/jquery-3.1.1.min.js"></script>
</head>

<body>
<script>
var SelectFalse = false; //用于判断是否被选择条件
function Submit()
{
var chboxValue = [];
var CheckBox = $('input[type = checkbox]');//得到所的复选框

for(var i = 0; i < CheckBox.length; i++)
{
//jquery1.6以上可以if(CheckBox[i].prop('checked') == true)去判断checkbox是否被选中
if(CheckBox[i].checked)//如果有1个被选中时
{
SelectFalse = true;
chboxValue.push(CheckBox[i].value)//将被选择的值追加到
}
}

if(!SelectFalse)
{
alert("对不起：爱好至少要选一项");
return false
}
alert("您选择爱好对应的value是："+chboxValue);
}
</script>
<h2>请选择您的爱好：</h2>
<form action="">
<label><input type="checkbox" name="hobby" value="上班" />上班</label>
<label><input type="checkbox" name="hobby" value="运动" />运动</label>
<label><input type="checkbox" name="hobby" value="看书" />看书</label>
<label><input type="checkbox" name="hobby" value="上网" />上网</label>
<label><input type="checkbox" name="hobby" value="网购" />网购</label>
<label><input type="checkbox" name="hobby" value="其他" />其他</label>
<input type="reset" value="重 置" />
<input type="button"   onclick="Submit()" value="提交选择" />
</form>
</body>
</html>