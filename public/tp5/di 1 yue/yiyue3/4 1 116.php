<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_POST['id'];
	$sname=$_POST['sname'];
	$stext=$_POST['stext'];
	$sprice=$_POST['sprice'];
	$snumber=$_POST['snumber'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update shi1 set sname='$sname',stext='$stext',sprice='$sprice',snumber='$snumber' where id='$id'";
	$res=mysqli_query($link,$sql);
	$a=mysqli_affected_rows($link);
	if($a===1){
		echo '修改成功';
		header("refresh:2,url='4 1 113.php'");
	}else if($a===0){
		echo '未修改，请修改';
		header("refresh:2,url='4 1 115.php?id=$id'");
	}else {
		echo '修改错误';
	}
?>