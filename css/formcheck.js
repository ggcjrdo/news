// JavaScript Document
/*登陆时使用的函数*/
function logincheck(){
	 var name =document.getElementById("name");
	 var password=document.getElementById("password");
	 
	 if(name.value == "") {  
	       alert("用户名不能为空");  
           name.focus();  
           return false;  
       }
	   
	 if(password.value == "") {  
	       alert("密码不能为空");  
           password.focus();  
           return false;  
       }
	}
/*添加新闻时使用的函数*/
function addcheck(){
	 var title = document.getElementById("title");
	 var date=document.getElementById("date");
	 var reporter =document.getElementById("reporter");
	 var content=document.getElementById("content");
	 
	 document.getElementById("titleinfo").innerHTML = "";
	 document.getElementById("dateinfo").innerHTML="";
	 document.getElementById("repoinfo").innerHTML = "";
	 document.getElementById("contentinfo").innerHTML = "";
	 
	 if(title.value == ""||!title.value.trim()) {  
	       document.getElementById("titleinfo").innerHTML = "***标题不能为空或全是空格***";   
           title.focus();  
           return false;  
       }
	 
	 if(date.value==""||date.value==null){
		 document.getElementById("dateinfo").innerHTML="***日期不能为空***";
		 date.focus();
		 return false;
	   }
	 
	 if(reporter.value == ""||!reporter.value.trim()) {  
	       document.getElementById("repoinfo").innerHTML = "***记者不能为空或全是空格***";    
           reporter.focus();  
           return false;  
       }
	   
	 if(content.value == ""||!content.value.trim()) {  
	       document.getElementById("contentinfo").innerHTML = "***内容不能为空或全是空格***";    
           content.focus();  
           return false;  
       }   
}

/*搜索新闻时不能带特殊字符*/
function newsSearch(){
	var text = document.getElementById("text");
	//正则表达式
 	var reg = new RegExp("^[A-Za-z0-9\u4e00-\u9fa5]+$");
	if(!reg.test(text.value.trim())){
			alert("请输入中文、数字和英文，不能带特殊字符！");
			text.value="";
			return false;        
  		}
	
	}
	
/*ajax判断审核状态*/	
function changecheck(id,type){
	var xmlhttp;
	alert("你选择了"+type);	
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
    }else{// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }	  
/*	xmlhttp.onreadystatechange=function(){
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
	  }
	}*/
	xmlhttp.open("POST","function/check.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("id="+id+"&type="+type);

}
