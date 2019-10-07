<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update goods set is_del=2 where id='$id'";
	$rsc=mysqli_query($link,$sql);
	if($rsc==true){
		echo '成功';
		header("refresh:2,url='shangpin1.php'");
	}
?>

