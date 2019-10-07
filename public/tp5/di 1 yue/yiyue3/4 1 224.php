<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_POST['id'];
	$sname1=$_POST['sname1'];
	$sname2=$_POST['sname2'];
	$sname3=$_POST['sname3'];
	$sname4=$_POST['sname4'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update sname12 set sname1='$sname1',sname2='$sname2',sname3='$sname3',sname4='$sname4' where id='$id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '修改成功';
		header("refresh:2,url='4 1 221.php'");
	}
?>