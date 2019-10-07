<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="4 30 1_do.php" method="post">
		<table border="1">
			<tr>
				<td>员工姓名</td>
				<td><input type="text" name="s_name"></td>
			</tr>
			<tr>
				<td>性别</td>
				<td>
					<input type="radio" name="s_sex" value="2" checked>女
					<input type="radio" name="s_sex" value="1">男
				</td>
			</tr>
			<tr>
				<td>邮箱</td>
				<td><input type="text" name="s_email" onblur="youa()"><span>*</span></td>
			</tr>
			<tr>
				<td>电话</td>
				<td><input type="tel" name="s_tel"></td>
			</tr>
			<tr>
				<td>部门</td>
				<td>
					<select name="da">
						<?php 
							$link=mysqli_connect('127.0.0.1','root','','xo');
							$sql="select * from department";
							$res=mysqli_query($link,$sql);
							while($arr=mysqli_fetch_assoc($res)){
						 ?>
							<option value="<?php echo $arr['d_id'] ?>"><?php echo $arr['d_name'] ?></option>
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
	<script type="text/javascript">
	function youa()
	{
		var ab=document.getElementsByTagName('input')[3].value;
		//console.log(ab);
		 var abb=document.getElementsByTagName('span')[0];
		 var cc=/^[a-z]\w{1,19}@(\.)|con$/;
		if(!cc.test(ab)){
			abb.innerHTML='格式不对';
		}else{
			abb.innerHTML="√";
		}
	}
	</script>
</body>
</html>