<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_POST['id'];
	$aname=$_POST['aname'];
	$aradio=$_POST['aradio'];
	$ahoddy=$_POST['ahoddy'];
	$atext=$_POST['atext'];
	$asheng=empty($_POST['asheng'])?"":$_POST['asheng'];
	$nhoddy=implode(",",$ahoddy);
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update one set aname='$aname',nhoddy='$nhoddy',aradio='$aradio',atext='$atext',asheng='$asheng' where id='$id'";
	$res=mysqli_query($link,$sql);
	//if($res){
	//	echo '修改成功';
	//	header("refresh:2,url='4 1 335.php'");
	//}	$a=mysqli_affected_rows($link);

	$a=mysqli_affected_rows($link);
	if($a===1){
		echo '修改成功';
		header("refresh:2,url='4 1 335.php'");
	}else if($a===0){
		echo '未修改';
		header("refresh:2,url='4 1 337.php?id=$id'");
	}else {
		echo '失败';
	}
?>