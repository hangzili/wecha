<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="select * from denglu";
	$rsc=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($rsc,MYSQLI_ASSOC);
	//var_dump ($arr);
	
	
?>
<form action="3 23 224.php" method="post">
	<!-- <input type="hidden" name="id" value="<?php echo $rsc['id'];?>"> -->
<table border="1">
	<tr>
		<td>用户名</td>
		<td><input type="text" name="yong" value="<?php echo $arr['yong'];?>"></td>
	</tr>
	<tr>
		<td>用户年龄</td>
		<td><input type="text" name="mima" value="<?php echo $arr['mima'];?>"></td>
	</tr>
	<tr>
		<td>用户信息</td>
		<td><input type="text" name="xinxi" value="<?php echo $arr['xinxi'];?>"></td>
	</tr>
	<tr>
		<td><input type="submit" value="修改"></td>
		<td></td>
	</tr>
</table>
</form>
