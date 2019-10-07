<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="4 28 2to.php" method="post" onsubmit="return ja()">
	姓名：<input type="text" name="c_name" onblur="nam()"><span>*</span><br>
	性别：<input type="radio" value="0" name="c_sex">女
		  <input type="radio" value="1" name="c_sex">男<br>
	爱好：<input type="checkbox" name="c_hobby[]" value="0">唱歌
		  <input type="checkbox" name="c_hobby[]" value="1">跳舞
		  <input type="checkbox" name="c_hobby[]" value="2">游泳<br>
	班级：<select name="c_class">
			<option value="0">1班</option>		
			<option value="1">2班</option>		
			<option value="2">3班</option>		
		  </select><br>
		 <input type="submit" value="添加">
</form>
<script type="text/javascript">
	var jiao=false;
	function nam()
	{
		var aa=document.getElementsByTagName('input')[0].value;
		var bb=document.getElementsByTagName('span')[0];
		var cc=/^[a-z]\w{3,19}$/;
		if(aa==""){
			bb.innerHTML='<b style="color:red">不能为空</b>';
			return false;
		}
		if(!cc.test(aa)){
			bb.innerHTML='<b style="color:red">格式不对</b>';
			return false;
		}else {
			var x=new XMLHttpRequest();
			x.onreadystatechange=function()
			{
				if(x.readyState==4 && x.status==200){
					if(x.responseText=='ok'){
						bb.innerHTML='名称不能重复';
						jiao=false;
					}else{
						bb.innerHTML="√";
						jiao=true;
					}
				}
			}
		}
		x.open('get','4 28 2.php?pp='+aa,true);
		x.send();
		return jiao;
	}
	function ja()
	{
		var ji=nam();
		return ji;
	}
</script>
</body>
</html>