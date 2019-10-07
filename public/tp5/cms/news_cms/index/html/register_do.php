<?php 
	$user_name=$_POST['user_name'];
	$user_pwd=md5($_POST['user_pwd']);
	$user_tel=$_POST['user_tel'];
	$user_email=$_POST['user_email'];
	$time=time();
	if(empty($user_name)){
		echo "用户名不能为空";
		exit();
	}
	if(empty($user_pwd)){
		echo "密码不能为空";
		exit();
	}
	if(empty($user_tel)){
		echo "电话不能为空";
		exit();
	}
	if(empty($user_email)){
		echo "电子邮件不能为空";
		exit();
	}
	$link=mysqli_connect('127.0.0.1','root','','18099');
	$sql="select * from user where user_name='$user_name'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	if($arr){
		echo "已经有，从新注册";
		header("refresh:2;url='reister.php'");
		exit();
	}
	$sql2="insert into user(user_name,user_pwd,user_tel,user_email,register_time) values('$user_name','$user_pwd','$user_tel','$user_email','$time')";
	$res2=mysqli_query($link,$sql2);
	if($res2){
		echo "注册成功";
		header("refresh:2;url='login.php'");
	}
 ?>