<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from sname12 where id='$id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
?>
<form action="4 1 224.php" method="post"><table border="1">
<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
	<tr>
		<td>姓名</td>
		<td><input type="text" name="sname1" value="<?php echo $arr['sname1'];?>"></td>
	</tr>
	<tr>
		<td>年龄</td>
		<td><input type="text" name="sname2" value="<?php echo $arr['sname2'];?>"></td>
	</tr>
	<tr>
		<td>岁数</td>
		<td><input type="text" name="sname3" value="<?php echo $arr['sname3'];?>"></td>
	</tr>

	<tr>
		<td>多大了</td>
		<td><input type="text" name="sname4" value="<?php echo $arr['sname4'];?>"></td>
	</tr>
	<tr>
		<td>爱好</td>
		<td>
			<input type="checkbox" name="aihao" value="游泳">游泳
			<input type="checkbox" name="aihao" value="唱歌">唱歌
			<input type="checkbox" name="aihao" value="跳舞">跳舞
		</td>
	</tr>
	<tr>
		<td><input type="submit" value="修改"></td>
		<td></td>
	</tr>
	</table>
	</form>