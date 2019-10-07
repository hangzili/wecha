<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_POST['id'];
	$nname=$_POST['nname'];
	$nradio=empty($_POST['nradio'])?"":$_POST['nradio'];
	$nage=$_POST['nage'];
	
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update zhousia set nname='$nname',nradio='$nradio',nage='$nage' where id='$id'";
	//echo $sql;
	$res=mysqli_query($link,$sql);
	if($res){
		echo '修改成功';
		header("refresh:2,url='3 28 221.php'");
	}
?>