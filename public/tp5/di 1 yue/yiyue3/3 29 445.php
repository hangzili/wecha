<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_POST['id'];
	$sname=$_POST['sname'];
	$yinhang=$_POST['yinhang'];
	$number=$_POST['number'];
	$money=$_POST['money'];
	$tel=$_POST['tel'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update book2 set sname='$sname',yinhang='$yinhang',number='$number',money='$money',tel='$tel' where id='$id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '修改成功';
		header("refresh:2,url='3 29 441.php'");
	}
?>