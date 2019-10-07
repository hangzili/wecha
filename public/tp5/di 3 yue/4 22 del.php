<?php 
	$s_id=$_GET['s_id'];
	$link=mysqli_connect('127.0.0.1','root','','xo');
	$sql="delete from student where s_id='$s_id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "删除成功";
		header("refresh:2;url='4 22 list.php'");
	}

 ?>