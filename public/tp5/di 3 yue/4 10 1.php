<?php 
	$a_name=$_POST['a_name'];
	$a_man=$_POST['a_man'];
	$a_time=time();
	if(empty($a_name)){
		exit ("名称不能为空");
	}
	
		$link2=mysqli_connect('127.0.0.1','root','','xo');
 		$sql2="select * from action where a_name='$a_name'";
 		$res2=mysqli_query($link2,$sql2);
 		$arr2=mysqli_fetch_assoc($res2);
 		if($arr2){
 			echo "已有，不能重复添加";
 			exit;
 		}
	
	if(empty($a_man)){
		exit ("添加人不能为空");
	}
 	$link=mysqli_connect('127.0.0.1','root','','xo');
 	$sql="insert into action(a_name,a_man,a_time) values('$a_name','$a_man','$a_time')";
 	$res=mysqli_query($link,$sql);
 	if($res){
 		echo "添加成功";
 		header("refresh:2,url='4 10 11.php'");
 	}




 ?>