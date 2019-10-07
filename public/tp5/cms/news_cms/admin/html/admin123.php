
<?php 
session_start();//开启session
if(empty($_SESSION['123'])){

	echo '先登陆';
	//header("refresh:2,url=''")
}

 ?>

