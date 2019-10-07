<?php
	header('content-type:text/html;charset=utf-8');
	$yong=empty($_POST['yong'])?"":$_POST['yong'];
	$mima=empty($_POST['mima'])?"":$_POST['mima'];
	$que=empty($_POST['que'])?"":$_POST['que'];
	$you=empty($_POST['you'])?"":$_POST['you'];
	$ai=empty($_POST['ai'])?"":$_POST['ai'];
	$shou=empty($_POST['shou'])?"":$_POST['shou'];
	
	if(strlen($yong)<6||strlen($yong)>8){
		die ('用户名6-8位之间');
	}
	
	$one=substr($yong,0,1);
	if(is_numeric($one)==true){
		die ('第一位不能是数字');
	}
	if(strlen($que)<6){
		die ('必须六位以上');
	}else if($mima!=$que){
		die ('和密码一致');
	}
	$fuhao='@';
	if(substr_count($you,$fuhao)!=1){
		die ('输入邮箱正确格式');
	}
	if(strlen($shou)!=11){
		die ('手机号必须位11位');
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="insert into yonghu(yong,you,ai,shou) values('$yong','$you','$ai','$shou')";
	$src=mysqli_query($link,$sql);
	if($src==true){
		echo '跳转正确';
		header("refresh:2,url='3 21 221.php'");
	}
?>
