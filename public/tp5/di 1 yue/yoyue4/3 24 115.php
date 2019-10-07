<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update zhou1 set is_del=2 where id='$id'";
	$res=mysqli_query($link,$sql);
	if($res==true){
		echo '成功';
		header("refresh:2,url='3 24 111.php'");
	}
?>