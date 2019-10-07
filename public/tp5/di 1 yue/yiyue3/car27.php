<?php 
	header("content-type:text/html;charset=utf-8");
	$pname=$_POST['pname'];
	$pprice=$_POST['pprice'];
	$pdesc=$_POST['pdesc'];
	$is_del=1;
	if(empty($pname)){
		die ("名称不能为空");
	}
	if(empty($pprice)){
		die ("价格不能为空");
	}
	if(empty($pdesc)){
		die ("描述不能为空");
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="insert into carcar(pname,pprice,pdesc,is_del) values('$pname','$pprice','$pdesc','$is_del')";
	$res=mysqli_query($link,$sql);
	if($res==true){
		echo '正确';
		header("refresh:2,url='car271.php'");
	}

?>