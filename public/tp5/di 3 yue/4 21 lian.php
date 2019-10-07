<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="4 21 lian to.php" method="post">
		<table>
			<tr>
				<td>姓名</td>
				<td><input type="text" name="c_name"></td>
			</tr>
			<tr>
				<td>性别</td>
				<td><input type="radio" name="b_sex" value="1">男
					<input type="radio" name="b_sex" value="0">女
				</td>
			</tr>
			<tr>
				<td>爱好</td>
				<td>
					<input type="checkbox" name="b_hobby" value="1">读书
					<input type="checkbox" name="b_hobby" value="2">听音乐
					<input type="checkbox" name="b_hobby" value="3">打篮球
				</td>
			</tr>
			 <tr>
			 	<td>班级</td>
			 	<td>
			 	<?php  
			 			$link=mysqli_connect('127.0.0.1','root','','xxoo');
			 			$sql="select c_name from class";
			 			//var_dump ($sql);
			 			$res=mysqli_query($link,$sql);
			 			while($arr=mysqli_fetch_assoc($res)){
			 				$array[]=$arr;
			 			}
			 			
			 		 ?>
				 		<select name="b_class">
				 		<?php foreach($array as $k=>$v){
						 ?>
				 			<option>
								<?php echo $v['c_name'] ?>
				 			</option>
				 			<?php } ?>
				 		</select>
				 		
			 	</td>
			 </tr>
			 <tr>
			 	<td><input type="submit" value="添加"></td>
			 	<td></td>
			 </tr>
		</table>
	</form>
</body>
</html>
