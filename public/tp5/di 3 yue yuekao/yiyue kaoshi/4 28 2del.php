<?php 
	$pp=$_GET['pp'];
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="delete from ccc where c_id='$pp'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "ok";
	}else {
		echo "no";
	}
	



 ?>