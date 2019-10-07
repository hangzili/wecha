<?php 
	include_once('5_11_c.php');
	$c_id=$_POST['c_id'];
	//echo $c_id;
	$a=new ada;
	$b=$a->update('admina',$_POST)->where('c_id','=',$c_id)->querya();
	if($b){
		echo "修改成功";
		header("refresh:2;url='5_11_d.php'");
	}



 ?>