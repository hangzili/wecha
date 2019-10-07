<?php 
	session_start();
	$n_id=$_POST['n_id'];
	if(empty($_SESSION['xxoo'])) {
		echo "<script>alert('请先登陆');location.href='login.php?n_id=$n_id'</script>";
		exit();
	}
	
	$com_content=$_POST['com_content'];
	if(empty($com_content)){
		echo "<script>alert('评论不能为空');location.href='news_content.php?n_id=$n_id'</script>";
		exit();
	}
	$user_id=$_SESSION['xxoo']['user_id'];
	$com_time=time();

	$link=mysqli_connect('127.0.0.1','root','','18099');
	$sql="insert into comment(com_content,com_time,user_id,news_id) values('$com_content','$com_time','$user_id','$n_id')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "<script>alert('评论成功');location.href='news_content.php?n_id=$n_id'</script>";
	}
	





 ?>