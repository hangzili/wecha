<?php
	header('content-type:text/html;charset=utf-8');
	$jia=$_POST['jia'];
	$wei=$_POST['wei'];
	$chan=$_POST['chan'];
	if(empty($jia)){
		echo '不能为空';
	}
	if(empty($wei)){
		echo '不能为空';
	}
	$a=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	//$b="insert into kafei(jia,wei,chan) values('$jia','$wei','chan')";
	//$c=mysqli_query($a,$b);
	//var_dump ($c);
		$q="select * from kafei";
		$e=mysqli_query($a,$q);
	//var_dump ($e );
		$arr=mysqli_fetch_all($e);
		print_r ($arr);

?>