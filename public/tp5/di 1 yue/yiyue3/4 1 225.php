<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update sname12 set is_del=2 where id='$id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '回收成功';
		header("refresh:2,url='4 1 221.php'");
	}
?>