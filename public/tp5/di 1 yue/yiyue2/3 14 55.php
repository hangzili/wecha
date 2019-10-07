<?php
	header('content-type:text/html;charset=utf-8');
	$a=$_POST['a'];
		if($a==1){
				echo '要吃米饭';
		} else if($a=2){
			echo '要吃馒头';
		} else {
			echo '要吃面条';
		}
?>