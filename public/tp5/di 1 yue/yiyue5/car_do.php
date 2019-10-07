<?php
	header('content-type:text/html;charset=utf-8');
	$cname=$_POST['cname'];
	$cprice=$_POST['cprice'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="insert into car(cname,cprice) values('$cname','$cprice')";
		//echo $sql;
	$src=mysqli_query($link,$sql);
		//var_dump ($src);
	if($src==true){
		echo '跳转正确';
		header("refresh:2,url='car_list.php'");
	}else {
		echo '不对';
	}

?>	
