<?php 
	header("content-type:text/html;charset=utf-8");
	$id=$_POST['id'];
	$tname=$_POST['tname'];
	$tauthor=$_POST['tauthor'];
	$tprice=$_POST['tprice'];
	$tid=$_POST['tid'];
	$ttext=$_POST['ttext'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update booka set tname='$tname',tauthor='$tauthor',tprice='$tprice',tid='$tid',ttext='$ttext' where id='$id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '修改成功';
		header("refresh:2,url='3 28 331.php'");
	}
	
?>