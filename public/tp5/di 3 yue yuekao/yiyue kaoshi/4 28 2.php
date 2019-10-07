<?php 
	$pp=$_GET['pp'];
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select * from ccc where c_name='$pp'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	if($arr){
		echo "ok";
	}else {
		echo "no";
	}
	

 ?>