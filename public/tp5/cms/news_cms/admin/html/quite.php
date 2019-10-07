<?php 
	session_start();
	$aa=$_SESSION['username'];
	unset($aa);//销毁指定变量
	echo '退出登陆';header("refresh:2,url='login.php'");




 ?>