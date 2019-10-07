<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','18099');
	$sql="delete from goods where id='$id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '删除成功';
		header("refresh:2,url='4 2 13.php'");
	}
?>