<?php 
	header("content-type:text/html;charset=utf-8");
	$id=$_POST['id'];
	$pname=$_POST['pname'];
	$pprice=$_POST['pprice'];
	$pdesc=$_POST['pdesc'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update carcar set pname='$pname',pprice='$pprice',pdesc='$pdesc' where id='$id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '修改成功';
		header("refresh:2,url='car271.php'");
	}
?>