<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_POST['id'];
	$goods_name=$_POST['goods_name'];
	$desca=$_POST['desca'];
	$price=$_POST['price'];
	$num=$_POST['num'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update goods set goods_name='$goods_name',desca='$desca',price='$price',num='$num' where id='$id'";
	$rsc=mysqli_query($link,$sql);
	if($rsc==true){
		echo '修改成功';
		header("refresh:2,url='tianjia3.php'");
	}
?>