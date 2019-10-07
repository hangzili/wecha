<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from tiku3 where id='$id'";
	//echo $sql;
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	//print_r ($res);
?>
 <form action="3 22 114.php" method="post">
 		<input type="hidden" name="id" value="<?php echo $arr['id'];?>">

 	<table border="1">
 		<tr>
 			<td>题库名称</td>
 			<td><input type="text" name="nname" value="<?php echo $arr['nname'];?>"</td>
 		</tr>
 		<tr>
 			<td>题库添加人</td>
 			<td><input type="text" name="nman" value="<?php echo $arr['nman'];?>"></td>
 		</tr>
 		<tr>
 			<td><input type="submit" value="修改"></td>
 			<td></td>
 		</tr>
 	</table>
 </form> 