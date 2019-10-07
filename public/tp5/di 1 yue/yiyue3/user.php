<?php
	header("content-type:text/html;charset=utf-8");
	$uname=$_POST['uname'];
	$upwd=md5($_POST['upwd']);
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into user(uname,upwd) values('$uname','$upwd')";
	$res=mysqli_query($link,$sql);
	if($res==true){
		echo '注册成功';
		header("refresh:2,url='user2.html'");
	}else{
		echo "失败";
	}

?>