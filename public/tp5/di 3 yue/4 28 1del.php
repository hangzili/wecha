<?php 
	$pp=$_GET['aa'];
	$link=mysqli_connect('127.0.0.1','root','','student');
	$sql="delete from class where c_id='$pp'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "ok";
	}else {
		echo "no";
	}


 ?>