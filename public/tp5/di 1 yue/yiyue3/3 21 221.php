<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="select * from yonghu";
	$rsc=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($rsc);	
	var_dump ($arr);
?>

