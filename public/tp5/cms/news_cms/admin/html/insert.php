<?php 
	$n_title=$_POST['n_title'];				//n_title   n_name分类  n_content内容  n_man		
	$c_id=$_POST['n_name'];
	$n_content=$_POST['n_content'];
	$n_man=$_POST['n_man'];
	//$c_id=$_POST['c_id'];
	$n_time=time();
	if(empty($n_title)){
		exit ("新闻标题不能为空");
	}
	$link=mysqli_connect('127.0.0.1','root','','18099');
	$sql="select * from news where n_title='$n_title'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	if($arr){
		echo "<script>alert('已有，不能重复添加');location.href='news_add.php'</script>";
		exit();
	}



	// if(empty($n_content)){
	// 	exit ("新闻分类不能为空");
	// }
	if(empty($n_content)){
		exit ("新闻内容不能为空");
	}
	if(empty($n_man)){
		exit ("添加人不能为空");
	}

	$sql2="insert into news(n_title,n_man,n_content,n_time,c_id) value('$n_title','$n_man','$n_content','$n_time','$c_id')";
	$res2=mysqli_query($link,$sql2);
	if($res2){
		echo "<script>alert=('添加成功');location.href='news_list.php'</script>";
	}


 ?>