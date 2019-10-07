<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="4 26 1_do.php" method="post">
		姓名：<input type="text" name="s_name" id="nameid" onblur="names()"><span>*</span><br>
		性别：<input type="radio" name="s_sex" value="0">女
		 	  <input type="radio" name="s_sex" value="1">男<br>
		爱好：<input type="checkbox" name="s_hobby" value="0">读书
			  <input type="checkbox" name="s_hobby" value="1">听音乐
			  <input type="checkbox" name="s_hobby" value="2">打篮球<br>
		班级：<select name="c_name">
				<?php 
					$link=mysqli_connect('127.0.0.1','root','','xxoo');
					$sql="select * from class3";
					$res=mysqli_query($link,$sql);
					while($arr=mysqli_fetch_assoc($res)){

				 ?>
					<option value="<?php echo $arr['c_id'] ?>"><?php echo $arr['c_name'] ?></option>
					<?php } ?>	
			  </select><br>
		<input type="submit" value="添加">
	</form>

	<script type="text/javascript">
	function names()
	{
		var namess=document.getElementsByTagName('input')[0].value;
		var spa=document.getElementsByTagName('span');
		var x=new XMLHttpRequest();
		x.onreadystatechange=function()
		{
			if(x.readyState==4&&x.status==200)
			{
				if(x.responseText=='ok'){
					spa.innerHTML='名称重复';
				}else {
					spa.innerHTML='√';
				}
			}
		}
	x.open('get','4 26 1.php?pp='+namess,true);
	x.send();

	}
	</script>
</body>
</html>