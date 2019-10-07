<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from car";
	$src=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($src);
	
?>
<form action="car_upd_do.php" method="post">
	<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
跑车名称<input type="text" name="cname" value="<?php echo $arr['cname'];?>"><br>
跑车价格<input type="text" name="cprice" value="<?php echo $arr['cprice'];?>"><br>
<input type="submit" value="修改">
</form>