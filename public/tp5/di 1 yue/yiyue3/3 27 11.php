<?php
	header("content-type:text/html;charset=utf-8");
	$ming=$_POST['ming'];
	$da=$_POST['da'];
	$tian=$_POST['tian'];
	$ti=$_POST['ti'];
	$time=date("H-m-d H:i:s",time());
	$is_del=1;
	if(empty($ming)){
		die ("不能为空");
	}
	if(empty($da)){
		die ("不能为空");
	}

	if(empty($tian)){
		die ("不能为空");
	}

	if(empty($ti)){
		die ("不能为空");
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into zhousan(ming,da,tian,ti,time,is_del) values('$ming','$da','$tian','$ti','$time','$is_del')";
	//echo $sql;
	$res=mysqli_query($link,$sql);
	if($res){
		echo '成功';
		header("refresh:2,url='3 27 111.php'");
	}


?>