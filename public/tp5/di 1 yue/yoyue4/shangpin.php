<?php
	header('content-type:text/html;charset=utf-8');
	$goods_name=$_POST['goods_name'];
	$desca=$_POST['desca'];
	$price=$_POST['price'];
	$num=$_POST['num'];
	$is_del=1;
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="insert into goods(goods_name,desca,price,num) values('$goods_name','$desca','$price','$num')";
	$rsc=mysqli_query($link,$sql);
	if($rsc==true){
		echo '跳转';
		header("refresh:2,url='shangpin1.php'");
	}
?>
