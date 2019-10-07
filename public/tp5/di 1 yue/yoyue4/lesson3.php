<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	//echo $id;
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from lesson where id='$id'";
	//echo $sql;
	$rsc=mysqli_query($link,$sql);
	//var_dump ($rsc);
	$arr=mysqli_fetch_assoc($rsc);

?>
<form action="lesson4.php" method="post">
	<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
	<table border="1">
		<tr>
			<td>课程名称</td>
			<td><input type="text" name="k_name" value="<?php echo $arr['k_name']?>"></td>
		</tr>
		<tr>
			<td>课程简介</td>
			<td><textarea cols="40" rows="10" name="k_desc" value="<?php echo $arr['k_desc']?>"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="修改"></td>
		</tr>
	</table>
	</form>
