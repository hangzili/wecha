<?php
	header('content-type:text/html;charset=utf-8');
	$ming=$_POST['ming'];
	$jia=$_POST['jia'];
	$shi=$_POST['shi'];
	$jiang=$_POST['jiang'];
	$shijian=date('Y-m-d H:i:s', time());
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="insert into kecheng(ming,jia,shi,shijian,jiang) values('$ming','$jia','$shi','$shijian','$jiang')";
	$rsc=mysqli_query($link,$sql); 
	if($rsc==true){
		echo '成功';
		header("refresh:2,url='3 20 331.php'");
	}
?>
