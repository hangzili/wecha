<?php 
	include_once('5_11_c.php');
	$c_id=$_GET['c_id'];
	$a=new ada;
	$b= $a->del('admina')->where('c_id','=',$c_id)->querya();
	if($b){
		echo "删除成功";
		header("refresh:2;url='5_11_d.php'");
	}
 ?>