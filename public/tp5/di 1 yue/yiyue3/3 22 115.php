<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update tiku3 set is_del=2 where id='$id'";
	//echo $sql;
	$res=mysqli_query($link,$sql);
	if($res==true){
		echo '放入回收站成功';
		header("refresh:2,url=3 22 111.php");

	}

?>