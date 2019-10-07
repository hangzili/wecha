


<?php
	header('content-type:text/html;charset=utf-8');
	$ming=$_POST['ming'];
	$dan=$_POST['dan'];
	$xing=$_POST['xing'];
	$ren=$_POST['ren'];
	if(empty($ming)){
		echo '名字不能为空';
	}
	if(is_numeric(substr($ming,0,1))=='ture'){
		echo '不能为数字';
	}
	if(strlen($dan)<6){
		echo '大于六位';
	}
	$q=mysqli_connect('127.0.0.1','root','root','a3191') or '不可以';
	$w="insert into diannao(c_name,c_price,c_number,c_man) values('$ming','$dan','$xing','$ren')";
	$e=mysqli_query($q,$w);
	if($e){
		echo "正确";
		header("refresh:2,url='123.php'");
	}else {
		echo "错误";
		header("refresh:2,url='123.html'");

	}
	

?>
 