<?php
	header('content-type:text/html;charset=utf-8');
	$goods_name=$_POST['goods_name'];
	$desca=$_POST['desca'];
	$price=$_POST['price'];
	$num=$_POST['num'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into goods1(goods_name,desca,price,num) values('$goods_name','$desca','$price','$num')";
	$rsc=mysqli_query($link,$sql);
	if($rsc==true){
		echo '正确';
		header("refresh:2,url='tianjia3.php'");
	}
?>