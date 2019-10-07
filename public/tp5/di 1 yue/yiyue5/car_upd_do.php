<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_POST['id'];
	$cname=$_POST['cname'];
	$cprice=$_POST['cprice'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="update car set cname='$cname',cprice='$cprice' where id='$id'";
	//var_dump ($sql);
	$res=mysqli_query($link,$sql);
	if($res==true){
		echo '修改成功';
		header("refresh:2,url=car_list.php");
	}
	
?>
