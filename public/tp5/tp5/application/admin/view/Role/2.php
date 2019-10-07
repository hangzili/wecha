<?php 
// echo '456';
$names = $_GET['pp'];
//查询数据库用户名是否相同
$link = mysqli_connect('127.0.0.1','root','','1902a');
$sql = "select * from user where user_name='$names'";
$result = mysqli_query($link,$sql);
$res = mysqli_fetch_assoc($result);
if($res){
	echo 'ok';
}else{
	echo 'no';
}

 ?>