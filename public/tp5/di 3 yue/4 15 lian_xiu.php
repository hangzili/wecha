<?php 
	$p_id=$_GET['p_id'];
	//echo $t_id;
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select * from pp where p_id='$p_id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	
 ?>
 <form action="4 15 lian_xiu2.php" method="post">
 <input type="hidden" name="p_id" value="<?php echo $arr['p_id'] ?>">
 	<table border="1">
 		<tr>
 			<td>标题</td>
 			<td><input type="text" name="p_titte" value="<?php echo $arr['p_titte'] ?>"></td>
 		</tr>
 		<tr>
 			<td>分类</td>
 			<td><input type="text" name="p_content" value="<?php echo $arr['p_content'] ?>"></td>
 		</tr>
 		<tr>
 			<td>添加人</td>
 			<td><input type="text" name="p_man" value="<?php echo $arr['p_man'] ?>"></td>
 		</tr>
 		<tr>
 			<td><input type="submit" value="修改"></td>
 			<td></td>
 		</tr>
 	</table>
 </form>