<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from sudent";
	$src=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($src);
	//var_dump ($arr);

?>
<form action="student4.php" method="post">
	<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
	学生名称<input type="text" name="sname" value="<?php echo $arr['sname'];?>"><br>
	<input type="submit" value="修改">
	</form>
