<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from diannao1 where id='$id'";
	//echo $sql;
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	//print_r ($arr);
?>
<form action="3 21 114.php" method="post">
	<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
		<table border="1">
			<tr>
				<td>电脑名称</td>
				<td><input type="text" name="ming" value="<?php echo $arr['ming'];?>"></td>
			</tr>
			<tr>
				<td>电脑单价</td>
				<td><input type="text" name="dan" value="<?php echo $arr['dan'];?>"></td>
			</tr>
			<tr>
				<td>电脑型号</td>
				<td><input type="text" name="xing" value="<?php echo $arr['xing'];?>"></td>
			</tr>
			<tr>
				<td>添加人</td>
				<td><input type="text" name="ren" value="<?php echo $arr['ren'];?>"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="修改">
					<input type="reset" value="重置"></td>
				
			</tr>
		</table>
	</form>