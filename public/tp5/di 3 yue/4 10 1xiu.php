<?php 
	$a_id=$_GET['a_id'];
	//echo $a_id;die;
	$link=mysqli_connect('127.0.0.1','root','','xo');
	$sql="select * from action where a_id='$a_id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
		
 ?>
 <meta charset="utf-8">
 <form action="4 10 1xiu2.php" method="post">
 <input type="hidden" name="a_id" value="<?php echo $arr['a_id'] ?>">
 <input type="hidden" name="old_name" value="<?php echo $arr['a_name'] ?>">
 	<table border="1">
 		<tr>
 			<td>名称</td>
 			<td>添加人</td>
 			<td>时间</td>
 		</tr>
 		
 		<tr>
 			<td><input type="text" name="a_name" value="<?php echo $arr['a_name'] ?>"></td>
 			<td><input type="text" name="a_man" value="<?php echo $arr['a_man'] ?>"></td>
 			<td><?php echo date("Y-m-d H:i:s",$arr['a_time']) ?></td>
 		</tr>
 		<tr>
 			<td></td>
 			<td><input type="submit" value="修改"></td>
 			<td></td>
 		</tr>
 	
 	</table>
 </form>