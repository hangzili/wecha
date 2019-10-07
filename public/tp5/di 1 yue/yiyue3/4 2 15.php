<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','18099');
	$sql="select * from goods where id='$id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
?>
<form action="4 2 16.php" method="post">
<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
	<table border="1">
		<tr>
			<th>商品名</th>
			<td><input type="text" name="goods_name" value="<?php echo $arr['goods_name'];?>"></td>
		</tr>
		<tr>
			<th>商品描述</th>
			<td><input type="text" name="desca" value="<?php echo $arr['desca'];?>"></td>
		</tr>
		<tr>
			<th>商品价格</th>
			<td><input type="text" name="price" value="<?php echo $arr['price'];?>"></td>
		</tr>
		<tr>
			<th>商品数量</th>
			<td><input type="text" name="num" value="<?php echo $arr['num'];?>"></td>
		</tr>
		<tr>
			<th><input type="submit" value="修改"></th>
			<td></td>
		</tr>
	</table>
</form>