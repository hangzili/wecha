<?php 
	header("content-type:text/html;charset=utf-8");
	//添加页面
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	$sex=$_POST['sex'];
	$introduce=$_POST['introduce'];
	$money=$_POST['money'];
	$city=$_POST['city'];
	$is_del=1;
	$time=date("Y-m-d H:i:s",time());
	$link=mysqli_connect('127.0.0.1','root','root','wish') or '错误';
	$sql="insert into admine_add(username,pwd,sex,introduce,money,city,is_del,time) values('$username','$pwd','$sex','$introduce','$money','$city','$is_del','$time')";
	//echo $sql;
	$res=mysqli_query($link,$sql);
	if($res){
		echo '成功';
		header("refresh:2,url='admin_add.php'");
	}

?>