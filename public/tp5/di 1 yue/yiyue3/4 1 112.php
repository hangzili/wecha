<?php
	header("content-type:text/html;charset=utf-8");
	$sname=$_POST['sname'];
	$stext=$_POST['stext'];
	$sprice=$_POST['sprice'];
	$snumber=$_POST['snumber'];
	$is_del=1;
	if(empty($sname)){
		die ("商品名不能为空");
	}
	if(empty($stext)){
		die ("商品描述不能为空");
	}
	if(empty($sprice)){
		die ("商品价格不能为空");
	}
	if(empty($snumber)){
		die ("商品数量不能为空");
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into shi1(sname,stext,sprice,snumber,is_del) values('$sname','$stext','$sprice','$snumber','$is_del')";
	//echo $sql;
	$res=mysqli_query($link,$sql);
	if($res){
		echo '添加成功';
		header("refresh:2,url='4 1 113.php'");
	}
?>