<?php 
	$link=mysqli_connect('127.0.0.1','root','','ada');
	$sql="select * from shangpin";
	$res=mysqli_query($link,$sql);
	$array=[];
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}
	echo json_encode($array);die;









 ?>