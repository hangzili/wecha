<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from za";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);

?>
<form action="3 31 225.php" method="post">
<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
		<table border="1">
			<tr>
				<td>商品名</td>
				<td><input type="text" name="gname" value="<?php echo $arr['gname'];?>"></td>
			</tr>
			<tr>
				<td>商品描述</td>
				<td><textarea name="gtext"><?php echo $arr['gtext'];?></textarea></td>
			</tr>
			<tr>
				<td>价格</td>
				<td><input type="text" name="gprice" value="<?php echo $arr['gprice'];?>"></td>
			</tr>
			<tr>
				<td>数量</td>
				<td><input type="text" name="gnumber" value="<?php echo $arr['gnumber'];?>"></td>
			</tr>
			<tr>
				<td><input type="submit" value="修改"></td>
				<td></td>
			</tr>
		</table>
	</form>