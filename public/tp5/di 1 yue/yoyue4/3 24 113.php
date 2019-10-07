<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from zhou1 where id='$id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	//var_dump ($arr);
	
?>

<form action="3 24 114.php" method="post">
	<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
<table border="1">
	<tr>
		<td>姓名</td> 
		<td><input type="text" name="sname" value="<?php echo $arr['sname'];?>"></td>
	</tr>
	<tr>
		<td>性别</td>
		<td><input type="radio" name="radio" value="男" value="<?php echo $arr['$radio'];?>">男
			<input type="radio" name="radio" value="女" value="<?php echo $arr['$radio'];?>">女</td>
	</tr>
	<tr>
		<td>年龄</td>
		<td><input type="text" name="sage" value="<?php echo $arr['sage'];?>"></td>
	</tr>
	<tr>
		<td>信息</td>
		<td><input type="text" name="sxinxi" value="<?php echo $arr['sxinxi'];?>"></td>
	</tr>
	<tr>
		<td>身高</td>
		<td><input type="text" name="sgao" value="<?php echo $arr['sgao'];?>"></td>
	</tr>
	<tr>
		<td><input type="submit" value="修改"></td>
		<td></td>
	</tr>
</table>
</form>