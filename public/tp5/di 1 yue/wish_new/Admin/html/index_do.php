<?php
	header("content-type:text/html;charset=utf-8");
	$nname=$_POST['nname'];
	$npwd=$_POST['npwd'];
	if(empty($nname)){
		die ("用户名不能为空");
	}
	if(empty($npwd)){
		die ("密码不能为空");
	}
	$link=mysqli_connect('127.0.0.1','root','root','wish_new');
	$sql="insert into admin_new(nname,npwd) values('$nname','$npwd')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '登陆成功';
		header("refresh:2,url='admin.php'");
	}

?>