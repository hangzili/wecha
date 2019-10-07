<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="4 24 1_do.php" method="post">
		姓名：<input type="text" name="s_name"><br>
		性别：<input type="radio" name="s_sex" vallue='0'>女
		      <input type="radio" name="s_sex" vallue='1'>男<br>
		爱好：<input type="checkbox" name="s_hobby[]" value="0">读书
			  <input type="checkbox" name="s_hobby[]" value="1">听音乐
			  <input type="checkbox" name="s_hobby[]" value="2">打篮球<br>
		选择班级<select name="c_id">
			<?php 
				$link=mysqli_connect('127.0.0.1','root','','xxoo');
				$sql="select * from class3";
				$res=mysqli_query($link,$sql);
				while($arr=mysqli_fetch_assoc($res)){
			 ?>
			 	<option value=<?php echo $arr['c_id'] ?>><?php echo $arr['c_name'] ?></option>
			 	<?php } ?>
			 </select><br>
			 <input type="submit" value="添加">
	</form>
</body>
</html>