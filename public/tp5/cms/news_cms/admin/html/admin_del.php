<?php 
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','','18099');
	$sql="delete from admin where id='$id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '删除成功';
		header("refresh:2,url='admin_list.php'");
	}













 ?>