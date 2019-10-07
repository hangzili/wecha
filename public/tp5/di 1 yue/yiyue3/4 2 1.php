<?php
	header("content-type:text/html;charset=utf-8");
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	if(empty($username)){
		die ("用户名");
	}
	if(empty($password)){
		die ("密码");
	}
	$link=mysqli_connect('127.0.0.1','root','root','test');
	$sql="insert into user(username,password) values('$username','$password')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '登陆成功';
		header("refresh:2,url='4 2 11.html'");
	}
	

?>