<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from goods where id='$id'";
	$rsc=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($rsc);
?>
<form action="shangpin4.php" method="post">
	<input type="hidden" name="id" value="<?php echo $arr['id'];?>">

	<table border="1">
		<tr>
			<td>商品名</td>
			<td><input type="text" name="goods_name" value="<?php echo $arr['goods_name'];?>"></td>
		</tr>
		<tr>
			<td>商品描述</td>
			<td><input type="text" name="desca" value="<?php echo $arr['desca'];?>"></td>
		</tr>
		<tr>
			<td>价格</td>
			<td><input type="text" name="price" value="<?php echo $arr['price'];?>"></td>
		</tr>
		<tr>
			<td>数量</td>
			<td><input type="text" name="num" value="<?php echo $arr['num'];?>"></td>
		</tr>
		<tr>
			<td><input type="submit" value="修改">
			<td></td>
		</tr>
	</table>
</form>