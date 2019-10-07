<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '不对';
	$sql="select * from zhousan where id='$id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	//var_dump ($arr);
?>
<form action="3 27 114.php" method="post">
<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
<table border="1">
	<tr>
		<th>题目名称</th>
		<td><input type="text" name="ming" value="<?php echo $arr['ming'];?>"></td>
	</tr>
	<tr>
		<th>题目答案</th>
		<td><input type="text" name="da" value="<?php echo $arr['da'];?>"></td>
	</tr>
	<tr>
		<th>题目添加人</th>
		<td><input type="text" name="tian" value="<?php echo $arr['tian'];?>"></td>		
	</tr>
	<tr>
		<th>题库</th>
		<td>
			<select name="ti" value="<?php echo $arr['ti'];?>">
				<option>123</option>
				<option>321</option>
				<option>1234567</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><input type="submit" value="修改"></td>
		<td></td>
	</tr>
</table>
</form>