<?php
	header("content-type:text/html;charset=utf-8");
	$sname=$_POST['sname'];
	$spai=$_POST['spai'];
	$sprice=$_POST['sprice'];


	$sshe=empty($_POST['sshe'])?"":$_POST['sshe'];
	$sshee=empty($_POST['sshee'])?"":$_POST['sshee'];
	$ssheee=empty($_POST['ssheee'])?"":$_POST['ssheee'];
	if($sshe==true){
		$sshe=1;
	}else{
		$sshe=2;
	}



	$smiao=$_POST['smiao'];
	$is_del=1;
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into sanxing(sname,spai,sprice,sshe,smiao,is_del) values('$sname','$spai','$sprice','$sshe','$smiao','$is_del')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '成功';
		header("refresh:2,url='3 27 221.php'");
	}
?>