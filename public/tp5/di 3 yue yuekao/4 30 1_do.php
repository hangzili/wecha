<?php 
	$s_name=$_POST['s_name'];
	$s_sex=empty($_POST['s_sex'])?"":$_POST['s_sex'];
	$s_email=$_POST['s_email'];
	$s_tel=$_POST['s_tel'];
	$d_id=$_POST['da'];
	if(empty($s_name)){
		echo "姓名不能为空";
		exit();
	}
	if(empty($s_sex)){
		echo "性别不能为空";
		exit();
	}
	if(empty($s_email)){
		echo "邮箱不能为空";
		exit();
	}
	if(empty($s_tel)){
		echo "电话不能为空";
		exit();
	}
	// 13  15  18
	$ab=array("13","15","18");
	$ass=substr($s_tel,0,2);
	if(!in_array($ass,$ab)){
		echo "电话不对";
		exit();
	}
	$link=mysqli_connect('127.0.0.1','root','','xo');
	$sql="insert into staff(s_name,s_sex,s_tel,s_email,d_id) values('$s_name','$s_sex','$s_tel','$s_email','$d_id')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "添加成功";
		header("refresh:2;url='4 30 1list.php'");
	}
 ?>