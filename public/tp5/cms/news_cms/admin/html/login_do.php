<?php 
	session_start();//开启session

	header("content-type:text/html;charset=utf-8");
	$username=empty($_POST['username'])?"":$_POST['username'];
	$pwd=empty($_POST['pwd'])?"":$_POST['pwd'];
	$link=mysqli_connect('127.0.0.1','root','','18099');
	$sql="select * from admin where username='$username' and pwd='$pwd'";
	//var_dump($sql);
	$res=mysqli_query($link, $sql);
	$arr=mysqli_fetch_assoc($res);
	
		$a=$arr['username'];
	//print_r($arr['username']);
	if($arr){
		//设置session
		$_SESSION['username']=$a;   


		echo '登陆成功';
		header("refresh:2,url='admin.php'");
	}else {
		echo '登陆失败';
	}















 ?>