<?php
	header("content-type:text/html;charset=utf-8");
	$t_id=$_POST['t_id'];
	$t_name=$_POST['t_name'];
	if(empty($t_id)){
		die ("不能为空");
	}
	if(empty($t_name)){
		die ("不能为空");
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from zhousan1 where t_id='$t_id' and t_name='$t_name'";
	//echo $sql;
	$res=mysqli_query($link,$sql);
	if($res==true){
		echo '成功';
		header("refresh:2,url='3 27 11.html'");
	}else {
		echo '失败';
	}

?>