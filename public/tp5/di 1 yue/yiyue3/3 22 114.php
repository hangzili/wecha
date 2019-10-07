<?php
	header('content-type:text/html;charset=utf-8');
	$nname=$_POST['nname'];
	$nman=$_POST['nman'];
	$id=$_POST['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update tiku3 set nname='$nname',nman='$nman' where id='$id'";
	//echo $sql;
	$res=mysqli_query($link,$sql);
	if($res==true){
		echo '修改成功';
		header("refresh:2,url=3 22 111.php");

	}

?>
	