<?php
	header('content-type:text/html;charset=utf-8');
	$jia=$_POST['jia'];
	$wei=$_POST['wei'];
	$chan=$_POST['chan'];
	if(empty($jia)){
		echo '填写';
	};
	if(empty($wei)){
		echo '填写';
	};
	if(empty($chan)){
		echo '填写';
	};

	
?>