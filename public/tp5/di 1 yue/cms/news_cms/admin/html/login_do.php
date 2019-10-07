<?php 
session_start();
	header("content-type:text/html;charset=utf-8");
	$username=empty($_POST['username'])?"":$_POST['username'];
	$pwd=empty($_POST['pwd'])?"":md5($_POST['pwd']);
	$link=mysqli_connect('127.0.0.1','root','root','18099');
	$sql="select * from admin where username='$username' and pwd='$pwd'";
	$res=mysqli_query($link, $sql);
	$arr=mysqli_fetch_assoc($res);
	if($arr){
		$_SESSION['username'] = $arr['username'];
		header("refresh:2,url='admin.php'");
	}else {
		echo '登陆失败';
	}















 ?>