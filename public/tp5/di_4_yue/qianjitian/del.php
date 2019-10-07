<?php 
	include_once('user_a.php');
	$c_id=$_GET['c_id'];
	$a=mysq::xxoo();
	$arr=$a->del('admina')->where('c_id','=',$c_id)->querya();
	if($arr){
		echo "删除成功";
		header("refresh:2;url='list.php'");
	}



 ?>