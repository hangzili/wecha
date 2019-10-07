<?php 
	$link=mysqli_connect('127.0.0.1','root','','18099');
	$sql="select * from news";
	$res=mysqli_query($link,$sql);
	$array=[];
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}
	echo json_encode($array);die;
	














 ?>