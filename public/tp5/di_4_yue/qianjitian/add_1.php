<?php 
		include_once('user_a.php');
	include_once('user_b.php');
		$a=new mysq;
		$res=$a->add('admina');
		$upload = new tu($_FILES['photo']);
	$status = $upload->moveFile();
	$_POST['photo'] = $upload->path.'/'.$upload->file_name;

	if($status)
	{
		echo "添加成功";die();
	}else{
		echo "添加失败";die();
	}






 ?>