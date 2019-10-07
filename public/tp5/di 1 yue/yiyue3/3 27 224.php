<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_POST['id'];
	$sname=$_POST['sname'];
	$spai=$_POST['spai'];
	$sprice=$_POST['sprice'];
	$sshe=empty($_POST['sshe'])?"":$_POST['sshe'];
	$smiao=$_POST['smiao'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update sanxing set sname='$sname',spai='$spai',sprice='$sprice',sshe='$sshe',smiao='$smiao' where id='$id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '修改成功';
		header("refresh:2,url='3 27 221.php'");
	}
	?>
	