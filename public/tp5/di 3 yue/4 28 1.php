<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="4 28 1_to.php" method="post" onsubmit="return cc()">
		姓名：<input type="text" name="c_name" onblur="namee()"><span>*</span><br>
		性别：<input type="radio" name="c_sex" value="0">女
		 	  <input type="radio" name="c_sex" value="1">男<br>
		爱好：<input type="checkbox" name="c_hobby[]" value="0">唱歌
			  <input type="checkbox" name="c_hobby[]" value="1">跳舞
			  <input type="checkbox" name="c_hobby[]" value="2">游泳<br>
		城市：<select name="c_city">
			  <option value="0">北京</option>
			  <option value="1">上海</option>
			  <option value="2">深圳</option>
			  </select><br>
		介绍：<textarea name="c_content" cols="30" rows="10" id='te' onblur="tea()"></textarea><span>*</span><br>
		<input type="submit" value="添加">
	</form>
	<script type="text/javascript">
	var tt=false;
	function namee()
	{
		var names=document.getElementsByTagName('input')[0].value;
		var sp=document.getElementsByTagName('span')[0];
		if(names==""){
			sp.innerHTML='姓名不能为空';
			return false;
		}else{
			sp.innerHTML='√';
		}
		var x= new XMLHttpRequest();
		x.onreadystatechange=function()
		{
			if(x.readyState==4 && x.status==200){
				if(x.responseText=='ok'){
					sp.innerHTML='不能重复';
					tt=false;
				}else{
					sp.innerHTML='√';
					tt=true;
				}
			}
		}
		x.open('get','4 28 11.php?pp='+names,true);
		x.send();
		return tt;
	}
	function tea()
	{
		var names=document.getElementById('te').value;
		var sp=document.getElementsByTagName('span')[1];
		if(names==""){
			sp.innerHTML='介绍不能为空';
			return false;
		}else{
			sp.innerHTML='√';
			return true;
		}
	}
	function cc()
	{
		var aa=namee();
		var bb=tea();
		return aa&&bb;
	}
	</script>
</body>
</html>