<?php
	header('content-type:text/html;charset=utf-8');
	$goods_id=$_POST['goods_id'];
	$goods_name_id=$_POST['goods_name'];
	$goods_price=$_POST['goods_price'];
	$goods_describe=$_POST['goods_describe'];
	$is_sale=$_POST['is_sale'];
	$is_del=1;
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="insert into zhoushi(goods_id,goods_name,goods_price,goods_describe,is_sale) values('$goods_id','$goods_name_id','$goods_price','$goods_describe','$is_sale')";
	$src=mysqli_query($link,$sql);
	if($src==true){
		echo '成功';
		header("refresh:2,url=3 23 111.php");
	}
?>
