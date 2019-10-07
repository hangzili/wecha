<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_POST['id'];
	$xingming=$_POST['xingming'];
	$mingcheng=$_POST['mingcheng'];
	$bianhao=$_POST['bianhao'];
	$jiage=$_POST['jiage'];
	$shuliang=$_POST['shuliang'];
	$ren=$_POST['ren'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update xiaoshou set xingming='$xingming',mingcheng='$mingcheng',bianhao='$bianhao',jiage='$jiage',shuliang='$shuliang',ren='$ren' where id='$id'";
	$res=mysqli_query($link,$sql);
	//if($res){
	//	echo '修改成功';
	//	header("refresh:2,url='3 28 111.php'");
	//}
	$qq=mysqli_affected_rows($link);
	if($qq===1){
		echo '修改成功';
		header("refresh:2,url='3 28 111.php'");
	}else if($qq===0){
		echo '未修改';
		header("refresh:2,url='3 28 113.php?id=$id'");
	}else {
		echo '修改失败';
	}
?>