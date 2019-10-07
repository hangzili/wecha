<?php
	header('content-type:text/html;charset=utf-8');
	//没用的
	$uname=$_POST['uname'];
	$upwd=$_POST['upwd'];
	if(empty($uname)){
		die ('用户名不能为我空');
	}
	if(empty($upwd)){
		die ('密码不能为我空');
	}
	$link=mysqli_connect('127.0.0.1','root','root','wish') or '错误';
	$sql="select * from admin  where uname='$uname' and upwd='$upwd'";
	$res=mysqli_query($link,$sql);
	//var_dump ($res);
	$arr=mysqli_fetch_assoc($res);
	//var_dump ($arr);
	if($arr){
		echo '登陆成功';
		header("refresh:2,url='admin.php'");
	}else {
		echo '登陆失败';
	}
?>
