<?php
	header("content-type:text/html;charset=utf-8");
	$yname=$_POST['yname'];
	$ypwd=$_POST['ypwd'];
	$yqpwd=$_POST['yqpwd'];
	$year=empty($_POST['year'])?"":$_POST['year'];
	$yradio=empty($_POST['yradio'])?"":$_POST['year'];
	$yemail=$_POST['yemail'];
	$ytel=$_POST['ytel'];
	$is_del=1;
	$time=date("H-m-d H:i:s",time());
	if(empty($yname)){
		die ("用户名不能为空");
	}
	//验证员工姓名去除空格后必须大于两个汉字
	
	
	if(strlen($yname)<6){
		die ('大于两位汉字');
	}
	// 验证密码长度在6位以上，
	// 验证密码和确认密码必须一致

	if(empty($ypwd)){
		die ("密码不能为空");
	}
	if(empty($yqpwd)){
		die ("密码不能为空");
	}
	if(strlen($ypwd)<6){
		die ("密码长度必须六位以上");
	}
	if($ypwd!=$yqpwd){
		die ("两个密码必须一样");
	}

	if(empty($year)){
		die ("年龄不能为空");
	}
	if(empty($yradio)){
		die ("性别不能为空");
	}
	if(empty($yemail)){
		die ("邮箱不能为空");
	}

	//if(substr_count($ytel,"@")==0){
	//	die ("必须包含@");
	//}
	// 验证去除电话号码两端的空白字符后计算电话号码的长度必须是11位，
	if(empty($ytel)){
		die ("电话不能为空");
	}
	$ytell=trim( $ytel );
	if(strlen($ytell)!=11){
		die ("电话号码必须是11位");
	}
	
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into yuan1(yname,ypwd,year,yradio,yemail,ytel,time,is_del) value('$yname','$ypwd','$year','$yradio','$yemail','$ytel','$time','$is_del')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '成功';
		header("refresh:2,url='3 29 331.php'");
	}
?>
