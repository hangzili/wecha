<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="4 29 1_do.php" method="post" onsubmit="return jiao()">
		姓名：<input type="text" name="c_name" onblur="cname()"><span>*</span><br>
		性别：<input type="radio" name="c_sex" value="1" checked>男
			  <input type="radio" name="c_sex" value="0">女<br>
		爱好: <input type="checkbox" name="c_hobby[]" value="0">唱歌
			  <input type="checkbox" name="c_hobby[]" value="1">跳舞
			  <input type="checkbox" name="c_hobby[]" value="2">游泳
		<input type="submit" value="添加">
	</form>
	<script type="text/javascript">
	var jiaoo=false;
	function cname()
	{
		var cnamee=document.getElementsByTagName('input')[0].value;
		var spann=document.getElementsByTagName('span')[0];
		var abc=/^[a-z]\w{2,10}$/;
		if(cnamee==""){
			spann.innerHTML='不能为空';
			return false;
		}
		if(!abc.test(cnamee)){
			spann.innerHTML='格式不对';
			return false;
		}else{
		var x= new XMLHttpRequest();
		x.onreadystatechange=function()
		{
			if(x.readyState==4 && x.status==200){
				if(x.responseText=='ok'){
					spann.innerHTML='名称重复';
					jiaoo=false;
				}else{
					spann.innerHTML='√';
					jiaoo=true;
				}
			}
		} 
		x.open('get','4 29 11.php?pp='+cnamee,true);
		x.send();
		return jiaoo;
		}
	}
	function jiao()
	{
		var a=cname();
		return a;
	}
	</script>
</body>
</html>