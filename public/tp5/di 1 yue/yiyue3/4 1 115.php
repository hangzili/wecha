<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from shi1 where id='$id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
?>
<form action="4 1 116.php" method="post">
<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
<table border="1">
	<tr>
		<td>商品名</td>
		<td><input type="text" name="sname" value="<?php echo $arr['sname'];?>"></td>
	</tr>
	<tr>
		<td>商品描述</td>
		<td><input type="text" name="stext" value="<?php echo $arr['stext'];?>"></td>
	</tr>
	<tr>
		<td>商品价格</td>
		<td><input type="text" name="sprice" value="<?php echo $arr['sprice'];?>"></td>
	</tr>
	<tr>
		<td>商品数量</td>
		<td><input type="text" name="snumber" value="<?php echo $arr['snumber'];?>"></td>
	</tr>
	<tr>
		<td><input type="submit" value="修改"></td>
		<td></td>
	</tr>
</table>
</form>