<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_POST['id'];
	$ming=$_POST['ming'];
	$da=$_POST['da'];
	$tian=$_POST['tian'];
	$ti=$_POST['ti'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '不对';
	$sql="update zhousan set ming='$ming',da='$da',tian='$tian',ti='$ti' where id='$id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '修改成功';
		header("refresh:2,url='3 27 111.php'");
	}
?>
