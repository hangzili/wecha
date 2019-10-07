<?php
	header('content-type:text/html;charset=utf-8');
	$ming=$_POST['ming'];
	$dan=$_POST['dan'];
	$xing=$_POST['xing'];
	$ren=$_POST['ren'];
	$is_del=2;
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into diannao1(ming,dan,xing,ren,is_del) values('$ming','$dan','$xing','$ren','$is_del')";
	$src=mysqli_query($link,$sql);
	if($src==true){
		echo '成功';
		header("refresh:2,url=3 21 111.php");
	}


?>