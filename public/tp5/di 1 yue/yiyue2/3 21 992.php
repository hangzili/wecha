<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="delete from tiku2 where id='$id'";
	$src=mysqli_query($link,$sql);
	if($src==true){
		echo '删除成功';
		header("refresh:2,url=3 21 991.php");
	}
?>
	
