<?php 
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from carcar where id='$id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	
?>
<form action="car274.php" method="post">
<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
 <table border="1">
	<tr>
		<td>跑车名称</td>
		<td>跑车价格</td>
		<td>跑车描述</td>
		<td></td>
	</tr>
	<tr>
		<td><input type="text" name="pname" value="<?php echo $arr['pname'];?>"></td>
		<td><input type="text" name="pprice" value="<?php echo $arr['pprice'];?>"></td>
		<td><input type="text" name="pdesc" value="<?php echo $arr['pdesc'];?>"></td>
		<td><input type="submit" value="修改"></td>
	</tr>
</table>
 </form>