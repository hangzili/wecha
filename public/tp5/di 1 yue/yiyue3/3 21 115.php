<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="update diannao1 set is_del=2 where id='$id'";
	//echo $sql;
	$src=mysqli_query($link,$sql);
	if($src==true){
		echo '放入回收站成功';
		header("refresh:2,url=3 21 111.php");
	}
?>
