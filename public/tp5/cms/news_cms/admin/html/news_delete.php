<?php 
	$n_id=$_GET['n_id'];
	$link=mysqli_connect('127.0.0.1','root','','18099');
	$sql="delete from news where n_id='$n_id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "成功";
	}
 ?>