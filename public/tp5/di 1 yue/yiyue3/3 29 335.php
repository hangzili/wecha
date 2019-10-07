<?php
	header("content-type:text/html;charset=utf-8");//修改
	$id=$_POST['id'];
	$yname=$_POST['yname'];
	$ypwd=$_POST['ypwd'];
	$year=empty($_POST['year'])?"":$_POST['year'];
	$yradio=empty($_POST['yradio'])?"":$_POST['year'];
	$yemail=$_POST['yemail'];
	$ytel=$_POST['ytel'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update yuan1 set yname='$yname',ypwd='$ypwd',year='$year',yradio='$yradio',yemail='$yemail',ytel='$ytel' where id='$id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '修改成功';
		header("refresh:2,url='3 29 331.php'");
	}
?>