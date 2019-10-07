<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="4 25 1_do.php" method="post" onsubmit="return xxoo()">
	姓名：<input type="text" name="s_name" onblur='te()'><span id='id1'>*</span><br>
	性别：<input type="radio" value="0" name="s_sex">女
		  <input type="radio" value="1" name="s_sex">男<br>
	爱好：<input type="checkbox" name="s_hobby[]" value="0">读书
	      <input type="checkbox" name="s_hobby[]" value="1">听音乐
	      <input type="checkbox" name="s_hobby[]" value="2">打篮球<br>
	班级：
		  <select name="id">
		  	<?php 
				$link=mysqli_connect('127.0.0.1','root','','xxoo');
				$sql="select * from class";
				$res=mysqli_query($link,$sql);
				while($arr=mysqli_fetch_assoc($res)){


			 ?>
		  	<option value="<?php echo $arr['c_id'] ?>"><?php echo $arr['c_name'] ?></option>
		  	<?php } ?>
		  </select><br>
		  <input type="submit" value="添加">
</form>
	<script type="text/javascript">
	var tt=false;
	function te()
	{
		
		var na1=document.getElementsByTagName('input')[0].value;
		var ida1=document.getElementsByTagName('span')[0];
		var aa=/^[a-z]\w{3,9}$/;
		if(na1==""){
			ida1.innerHTML='不能为空';
			return false;
		}
		var x= new XMLHttpRequest();
		x.onreadystatechange=function()
		{
			if(x.readyState==4 && x.status==200){
					if(aa.test(na1)){
						ida1.innerHTML='格式不对';
						tt=false;

					}else
						if(x.responseText=='ok'){
						ida1.innerHTML='姓名重复';
						tt=false;
					}else{
						ida1.innerHTML='√';
						tt=true;
					}
			}
		}
		x.open('get','25.php?pp='+na1,true);
		x.send();
	}
	function xxoo()
	{
		var s=te();
		return s;
	}
	</script>
</body>
</html>