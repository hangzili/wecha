<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from lian1";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);

?>
<form action="3 26 114.php" method="post">
	<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
 <table border="1">
	<tr>
		<td>用户名</td>
		<td><input type="text" name="yname" value="<?php echo $arr['yname'];?>"></td>
	</tr>
	<tr>
		<td>密码</td>
		<td><input type="password" name="mima" value="<?php echo $arr['mima'];?>"></td>
	</tr>
	<tr>
		<td><input type="submit" value="修改"></td>
		<td></td>
	</tr>
 </table>
 </form>