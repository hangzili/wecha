<?php
	header("content-type:text/html;charset=utf-8");
	$zname=$_POST['zname'];
	$zpwd=$_POST['zpwd'];
	 $link=mysqli_connect('127.0.0.1','root','root','a3191');
	 $sql="select * from zuci2 where zname='$zname' and zpwd='$zpwd'";
	 $res=mysqli_query($link,$sql);
	 if($res){
		echo '登陆成功';
		header("refresh:2,url='3 30 113.html'");
	 }
?>