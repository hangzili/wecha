<?php
	header('content-type:text/html;charset=utf-8');
	$a=$_POST['a'];
	if($a==1){
		echo '今天是星期一';
	}else if($a==2){
		echo '今天是星期二';
	}else if($a==3){
		echo '今天星期三';
	}else {
		echo '不知道';
	}
?>