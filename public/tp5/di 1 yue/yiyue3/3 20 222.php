<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="delete from tiku where id='$id'";
	$arr=mysqli_query($link,$sql);
	//var_dump ($arr);
	if($arr==true){
		echo '删除成功';
		header("refresh:2,url='3 20 221.php'");
	}
	?>