<?php
	header("content-type:text/html;charset=utf-8");
	$goods_name=$_POST['goods_name'];
	$desca=$_POST['desca'];
	$price=$_POST['price'];
	$num=$_POST['num'];
	if(empty($goods_name)){
		die ("商品名不能为空");
	}
	if(empty($desca)){
		die ("描述不能为空");
	}
	if(empty($price)){
		die ("价格不能为空");
	}
	if(empty($num)){
		die ("数量不能为空");
	}
	$link=mysqli_connect('127.0.0.1','root','root','18099');
	$sql="insert into goods(goods_name,desca,price,num) values('$goods_name','$desca','$price','$num')";
	
	$res=mysqli_query($link,$sql);
	if($res){
		echo '添加成功';
		header("refresh:2,url='4 2 13.php'");
	}
	

?>