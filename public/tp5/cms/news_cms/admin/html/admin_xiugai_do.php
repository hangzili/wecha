<?php 
$id=$_POST['id'];
$username=$_POST['username'];
	$psd=$_POST['psd'];
	$sex=$_POST['sex'];
	$nhobby=$_POST['nhobby'];
	$city=$_POST['city'];
	$hobby=implode(",",$nhobby);
$link=mysqli_connect('127.0.0.1','root','','18099');
$sql="update admin set username='$username',pwd='$psd',sex='$sex',hobby='$hobby',city='$city' where id='$id'";
$res=mysqli_query($link,$sql);
if($res){
	echo "修改成功";
	header("refresh:2,url='admin_list.php'");
}

//echo $sql;

 ?>


