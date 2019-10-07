<?php
	session_start(); 
	$user_name=$_POST['user_name'];
	$user_pwd=md5($_POST['user_pwd']);
	$time=time();
	$ip=$_SERVER['REMOTE_ADDR'];
	//var_dump($id);
	if(empty($user_name)){
		echo "用户名不能为空";
		exit();
	}
	if(empty($user_pwd)){
		echo "密码不能为空";
		exit();
	}

	$link=mysqli_connect('127.0.0.1','root','','18099');
	$sql="select * from user where user_name='$user_name' and user_pwd='$user_pwd'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	//$aa=$arr['user_name'];
	$id=$arr['user_id'];
	if($arr){
		$aa=array('user_name'=>$arr['user_name'],'user_id'=>$arr['user_id']);
		$_SESSION['xxoo'] =$aa;
		header("refresh:2;url='index.php'");
		$sql2="update user set login_time='$time',login_ip='$ip' where user_id='$id'";
		//var_dump($sql2);
		$res2=mysqli_query($link,$sql2);
		echo "登陆成功";
		exit();
	}else{
		echo "登陆失败";
	}



 ?>