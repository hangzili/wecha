<?php 
	header('content-type:text/html;charset=utf-8');
	$ming=$_POST['ming'];
	$ren=$_POST['ren'];
	$shi=date('Y-m-d H:i:s', time());
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="insert into tiku (ming,ren,shi) values ('$ming','$ren','$shi')";
	$rsc=mysqli_query($link,$sql);
	if($rsc==true){
		echo '正确';
		header("refresh:2,url='3 20 221.php'");
	}
	
?>
	