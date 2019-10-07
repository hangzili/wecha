<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_POST['id'];
	$sname=$_POST['sname'];
	$ssex=empty($_POST['ssex'])?"":$_POST['ssex'];
	$sdesc=$_POST['sdesc'];
	$is_shengban=empty($_POST['is_shengban'])?"":$_POST['is_shengban'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update student2 set sname='$sname',ssex='$ssex',sdesc='$sdesc',is_shengban='$is_shengban' where id='$id'";
	$res=mysqli_query($link,$sql);
	//if($res){
	//	die '修改成功';
	//	header("refresh:2,url='3 30 221.php'");
	//}
	$a=mysqli_affected_rows($link);
	if($a===1){
		echo '修改成功';
		header("refresh:2,url='3 30 221.php'");
	}else if($a===0){
		echo '未修改';
		header("refresh:2,url='3 30 223.php?id=$id'");
	}else {
		echo '失败';
	}

?>