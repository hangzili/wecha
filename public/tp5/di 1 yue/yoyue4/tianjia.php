<?php
	header('content-type:text/html;charset=utf-8');
	$username=$_POST['username'];
	$password=empty($_POST['password'])?"":$_POST['password'];
	if(empty($username)){
		echo '用户名不能为空';
	}
	if(empty($password)){
		echo '密码不能为空';
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from tianjia where username='$username' and password='$password'";
	$rsc=mysqli_query($link,$sql);
	if($rsc==true){
		echo '登陆成功';
		header("refresh:2,url='tianjia1.html'");
	}
?>