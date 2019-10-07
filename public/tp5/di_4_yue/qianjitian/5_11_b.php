<?php 
	include_once('5_11_c.php');
	$a=new ada;
	$b=$a->add('admina',$_POST);
	if($b){
		echo "添加成功";
		header("refresh:2;url='5_11_d.php'");
	}



 ?>