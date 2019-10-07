<?php 
	
	include_once('user_a.php');
	$c_id=$_POST['c_id'];
    $a=mysq::xxoo();
    $arr = $a->update('admina',$_POST)->where('c_id','=',$c_id)->querya();
    //var_dump($arr);
    if($arr){
    	echo "修改成功";
    	header("refresh:2;url='list.php'");
    }else{
    	echo "修改失败";
    }

 ?>