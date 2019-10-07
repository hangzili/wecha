<?php 
	include_once('5_14_class.php');
	$a=new mysql;
	mysql::$table='admina';
	$b=$a->inser($_POST)->quer();
	if($b){
		echo "成功";
		header("refresh:2;url='5_14_list.php'");
	}
 




 ?>