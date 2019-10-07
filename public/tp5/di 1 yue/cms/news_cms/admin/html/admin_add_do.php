<?php 
	header("content-type:text/html;charset=utf-8");
	$username=$_POST['username'];
	$psd=$_POST['psd'];
	$sex=$_POST['sex'];
	$nhobby=$_POST['nhobby'];
	$city=$_POST['city'];
	$hobby=implode(",",$nhobby);
	$link=mysqli_connect('127.0.0.1','root','root','18099');
	$sql="insert into admin(username,pwd,sex,hobby,city) value('$username','$psd','$sex','$hobby','$city')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '添加成功';
		header("refresh:2,url='admin_list.php'");
	}
	//echo $sql;


















 ?>