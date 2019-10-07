<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from zname where id='$id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	//var_dump($arr);
?>
<form action="3 31 118.php" method="post">
<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
<table border="1">
	<tr>
		<th>姓名</th>
		<td><input type="text" name="dname" value="<?php echo $arr['dname'];?>"></td>
	</tr>
	<tr>
		<th>年龄</th>
		<td><input type="text" name="dyear" value="<?php echo $arr['dyear'];?>"></td>
	</tr>
	<tr>
		<th>工资</th>
		<td><input type="text" name="dmoney" value="<?php echo $arr['dmoney'];?>"></td>
	</tr>
	<tr>
		<th><input type="submit" value="修改"></th>
		<td></td>
	</tr>
</table>
</form>