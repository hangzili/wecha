<?php
	header("content-type:text/html;charset=utf-8");
	$sname=$_POST['sname'];
	$ssex=empty($_POST['ssex'])?"":$_POST['ssex'];
	$sdesc=$_POST['sdesc'];
	$is_shengban=empty($_POST['is_shengban'])?"":$_POST['is_shengban'];
	$stime=date("Y-m-d H:i:s",time());
	$is_del=1;
	if(empty($sname)){
		die ("不能为空");
	}
	$q=substr($sname,0,1);
	if(is_numeric($q)==true){
		die ("首字母不能为数字");
	}
	if(empty($sdesc)){
		die ("不能为空");
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into student2(sname,ssex,sdesc,is_shengban,stime,is_del) values('$sname','$ssex','$sdesc','$is_shengban','$stime','$is_del')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '成功';
		header("refresh:2,url='3 30 221.php'");
	}

?>