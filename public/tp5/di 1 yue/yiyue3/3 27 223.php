<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from sanxing where id='$id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	//var_dump ($arr);
?>
<form action="3 27 224.php" method="post">
<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
	<table>
		<tr>
			<td>商品名称</td>
			<td><input type="text" name="sname" value="<?php echo $arr['sname'];?>"></td>
		</tr>
		
		<tr>
			<td>商品品牌</td>
			<td><input type="text" name="spai" value="<?php echo $arr['spai'];?>"></td>
		</tr>
		<tr>
			<td>商品价格</td>
			<td><input type="text" name="sprice" value="<?php echo $arr['sprice'];?>"></td>
		</tr>
		<tr>
			<td>商品设置</td>
			<td>
				<input type="checkbox" name="sshe">新品
				<input type="checkbox" name="sshe">精品
				<input type="checkbox" name="sshe">热卖
			</td>
		</tr>
		<tr>
			<td>商品描述</td>
			<td>
				<textarea name="smiao"><?php echo $arr['smiao'];?></textarea>
			</td>
		</tr>
		<tr>
			<td><input type="submit" value="修改"></td>
			<td></td>
		</tr>
	</table>
 </form>