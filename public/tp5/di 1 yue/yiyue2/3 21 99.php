<?php
	header('content-type:text/html;charset=utf-8');
	$ming=$_POST['ming'];
	$tian=$_POST['tian'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into tiku2(ming,tian) values('$ming','$tian')";
	$src=mysqli_query($link,$sql);
	if($src==true){
		echo '成功';
		header("refresh:2,url=3 21 991.php");
	}
?>