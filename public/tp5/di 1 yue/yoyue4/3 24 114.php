<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_POST['id'];
	$sname=$_POST['sname'];
	$radio=$_POST['radio'];
	$sage=$_POST['sage'];
	$sxinxi=$_POST['sxinxi'];
	$sgao=$_POST['sgao'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update zhou1 set sname='$sname',radio='$radio',sage='$sage',sxinxi='$sxinxi',sgao='$sgao' where id='$id'";
	$res=mysqli_query($link,$sql);
	if($res==true){
		echo '修改成功';
		header("refresh:2,url='3 24 111.php'");
	}
	

?>