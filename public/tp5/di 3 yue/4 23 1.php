<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="4 23 1_do.php" method="post">
		姓名	<input type="text" name="s_name" id='nid' onblur='named()'><span id='naid'>*</span><br>
		性别	<input type="radio" name="s_sex" value="0" id='sid' onblur='sexd()'>女
				<input type="radio" name="s_sex" value="1" id='sid' onblur='sexd()'>男<span id='said'>*</span><br>
		爱好	<input type="checkbox" name="s_hobby[]" value="0">读书
				<input type="checkbox" name="s_hobby[]" value="1">听音乐	
				<input type="checkbox" name="s_hobby[]" value="2">打篮球<br>
		选择班级<select name="aid">
				<?php 

				$link=mysqli_connect('127.0.0.1','root','','xxoo');
				$sql="select * from class2";
				$res=mysqli_query($link,$sql);
				while($arr=mysqli_fetch_assoc($res)){

				 ?>
				<option value="<?php echo $arr['id'] ?>"><?php echo $arr['c_name'] ?></option>
				<?php } ?>
				</select><br>

				<input type="submit" value="添加">
	</form>
	<script type="text/javascript">
			function named()
			{
				var nids=document.getElementById('nid').value;
				var naids=document.getElementById('naid');
				<?php 
				$link2=mysqli_connect('127.0.0.1','root','','xxoo');
				$sql2="select * from student2 where s_name=s_name";
				$res2=mysqli_query($link2,$sql2);
				$arr2=mysqli_fetch_assoc($res2);
				?>

				if(nids==""){
					naids.innerHTML='用户名';
				}
				
			}
			function sexd()
			{
				var sexds=document.getElementById('sid').value;
				var said=document.getElementById('said');
				if(sexds==""){
					naids.innerHTML='性别不能为空';
				}
			}
	</script>
</body>
</html>