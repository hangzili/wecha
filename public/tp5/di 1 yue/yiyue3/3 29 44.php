<?php
	header("content-type:text/html;charset=utf-8");
	$sname=$_POST['sname'];
	$yinhang=$_POST['yinhang'];
	$number=$_POST['number'];
	$money=$_POST['money'];
	$tel=$_POST['tel'];
	$is_del=1;
	if(empty($sname)){
		die ("名字不能位空");
	}
	
	if(empty($number)){
		die ("卡号不能位空");
	}
	if(strlen($number)!=18){
		die ("卡号必须是18位");
	}

	if(empty($money)){
		die ("钱不能位空");
	}
	if(empty($tel)){
		die ("电话不能位空");
	}
	if(substr($tel,0,1)!=1){
		die ("开头必须是1");
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into book2(sname,yinhang,number,money,tel,is_del) values('$sname','$yinhang','$number','$money','$tel','$is_del')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '成功';
		header("refresh:2,url='3 29 441.php'");
	}
?>
