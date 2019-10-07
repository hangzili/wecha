<?php 
	include_once('5_14_class.php');
	$c_id=$_GET['c_id'];
	$a=new mysql;
	mysql::$table='admina';
	$b=$a->del()->where('c_id','=',$c_id)->quer();
	var_dump($b);
	if($b){
		echo "删除成功";
		header("refresh:2;url='5_14_list.php'");
	}




 ?>