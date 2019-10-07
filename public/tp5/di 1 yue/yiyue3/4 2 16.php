<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_POST['id'];
	$goods_name=$_POST['goods_name'];
	$desca=$_POST['desca'];
	$price=$_POST['price'];
	$num=$_POST['num'];
	$link=mysqli_connect('127.0.0.1','root','root','18099');
	$sql="update goods set goods_name='$goods_name',desca='$desca',price='$price',num='$num' where id='$id'";
	$res=mysqli_query($link,$sql);
	//if($res){
	//	echo '修改成功';
	//	header("refresh:2,url='4 2 13.php'");
	//}
	$a=mysqli_affected_rows($link);
	if($a===1){
		echo '修改成功';
			header("refresh:2,url='4 2 13.php'");
	}else if($a===0){
		echo '未修改，请修改';
			header("refresh:2,url='4 2 15.php?id=$id'");
	}else{
		echo '错误';
	}
?>