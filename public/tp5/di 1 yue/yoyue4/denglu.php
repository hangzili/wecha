<?php
	header('content-type:text/html;charset=utf-8');
	$uname=$_POST['uname'];
	$upwd=md5($_POST['upwd']);
	if(empty($uname)){
		echo '用户名不能为空';
	}
	if(empty($upwd)){
		echo '密码不能为空';
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="select * from denglu1 where uname='$uname' and upwd='$upwd'";
	$rsc=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($rsc);
	if($arr==true){
		echo '登陆成功';
	}else{
	echo '登陆失败';
	}

?>