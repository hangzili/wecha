<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_POST['id'];
	$ming=$_POST['ming'];
	$dan=$_POST['dan'];
	$xing=$_POST['xing'];
	$ren=$_POST['ren'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="update diannao1 set ming='$ming',dan='$dan',xing='$xing',ren='$ren' where id='$id'";
	//var_dump ($sql);
	$res=mysqli_query($link,$sql);
	if($res==true){
		echo '修改成功';
		header("refresh:2,url=3 21 111.php");
	}
	
?>



