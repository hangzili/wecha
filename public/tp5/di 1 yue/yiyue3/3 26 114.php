<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_POST['id'];
	$yname=$_POST['yname'];
	$mima=$_POST['mima'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update lian1 set yname='$yname',mima='$mima' where id='$id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '修改成功';
		header("refresh:2,url=3 26 11.php");
 	}

?>