<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from xiaoshou where id='$id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	//var_dump ($arr);

?>
<form action="3 28 114.php" method="post">
<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
<table border="1">
	<tr>
		<td>客户姓名</td>
		<td>
			<select name="xingming" value="<?php echo $arr['xingming'];?>">
				<option>张三</option>
				<option>李四</option>
				<option>王五</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>名称</td>
		<td>
			<select name="mingcheng" value="<?php echo $arr['mingcheng'];?>">
				<option>毛巾</option>
				<option>牙刷</option>
				<option>牙膏</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>编号</td>
		<td><input type="text" name="bianhao" value="<?php echo $arr['bianhao'];?>"></td>
	</tr>
	<tr>
		<td>销售价格</td>
		<td><input type="text" name="jiage" value="<?php echo $arr['jiage'];?>"></td>
	</tr>
	<tr>
		<td>出库数量</td>
		<td><input type="text" name="shuliang" value="<?php echo $arr['shuliang'];?>"></td>
	</tr>
	<tr>
		<td>操作员</td>
		<td><input type="text" name="ren" value="<?php echo $arr['ren'];?>"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="修改"></td>
	</tr>
</table>
</form>