<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="4 27 2to.php" method="post" onsubmit="return jiao()">
		姓名：<input type="text" name="s_name" onblur="names()"><span>*</span><br>
		性别：<input type="radio" name="s_sex" value="0">女
		  	  <input type="radio" name="s_sex" value="1">男<br>
		爱好：<input type="checkbox" name="s_hobby[]" value="0">唱歌
			  <input type="checkbox" name="s_hobby[]" value="0">跳舞	  
			  <input type="checkbox" name="s_hobby[]" value="0">游泳<br>
			  <input type="submit" value="添加">
	</form>
	<script type="text/javascript">
	var ti=false;
	function names()
	{
		var namee=document.getElementsByTagName('input')[0].value;
		var nameee=document.getElementsByTagName('span')[0];
		if(namee==""){
			nameee.innerHTML='不能为空';
			return false;
		}
		var x= new XMLHttpRequest();
		x.onreadystatechange =function()
		{
			if(x.readyState==4 && x.status==200)
			{
				if(x.responseText=='ok'){
					nameee.innerHTML='名称不能重复';
					ti=false;
				}else {
					nameee.innerHTML='√';
					ti=true;
				}
			}
		}
	x.open('get','4 27.php?pp='+namee,true);
	x.send();
	return ti;
	}
	function jiao()
	{
		var aa=names();
		return aa;
	}
	</script>
</body>
</html>