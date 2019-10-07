<?php
	header('content-type:text/html;charset=utf-8');
	//修改执行页面
	$id=$_POST['id'];
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	$sex=empty($_POST['sex'])?"":$_POST['sex'];
	$introduce=$_POST['introduce'];
	$money=$_POST['money'];
	$city=$_POST['city'];
	$link=mysqli_connect('127.0.0.1','root','root','wish');
	$sql="update admine_add set username='$username',pwd='$pwd',sex='$sex',introduce='$introduce',money='$money',city='$city' where id='$id'";
	//echo $sql;
	$res=mysqli_query($link,$sql);
	if($res==true){
		echo '修改成功';
		header("refresh:2,url='admin_list.php'");
	}else{
		echo '修改失败';
	}

?>