 <?php 
// 	// $up=$_FILES['uploads'];
// 	// echo "<pre>";
// 	// var_dump($up);
// 	$types=$_FILES['uploads']['type'];
// 	$tmp_name=$_FILES['uploads']['tmp_name'];
// 	$error=$_FILES['uploads']['error'];
// 	$size=$_FILES['uploads']['size'];

// 	// 	array(5) {
// 	//   ["name"]=>-------------------------------------文件名字
// 	//   string(31) "微信图片_20190316215559.jpg"
// 	//   ["type"]=>-------------------------------------文件类型
// 	//   string(10) "image/jpeg"
// 	//   ["tmp_name"]=>-----------------------------------文件目录
// 	//   string(24) "D:\XAMPP\tmp\phpDB79.tmp"
// 	//   ["error"]=>---------------------------------------文件的错误号
// 	//   int(0)
// 	//   ["size"]=>-----------------------------------------文件的大小
// 	//   int(57904)
// 	// }

// 	//图片大小
// 	if($size>100000){
// 		echo "图片过大";
// 		exit();
// 	}
// 	//图片类型
// 	$image=array('image/png','image/jpg','image/jpeg');
// 	if(!in_array($types,$image)){
// 		echo "图片格式不对";
// 		exit();
// 	}


  ?>












 <?php 
 //$uploads=$_FILES['uploads'];
// echo "<pre>";
// var_dump($uploads);

 $types=$_FILES['uploads']['type'];
 $tmp_name=$_FILES['uploads']['tmp_name'];
 $error=$_FILES['uploads']['error'];
 $size=$_FILES['uploads']['size'];

	// array(5) {
	//   ["name"]=>-------------------------------------名称
	//   string(31) "微信图片_20190316215559.jpg"
	//   ["type"]=>--------------------------------------类型
	//   string(10) "image/jpeg"
	//   ["tmp_name"]=>-------------------------------------目录
	//   string(24) "D:\XAMPP\tmp\phpCD4D.tmp"
	//   ["error"]=>----------------------------------------错误号
	//   int(0)
	//   ["size"]=>--------------------------------------大小
	//   int(57904)
	// }
 if($size>100000){
 	echo "文件太大";
 	exit();
 }
 $image=array('image/jpg','image/jpeg','image/png');
 if(!in_array($error,$image)){
 	echo "文件不是图片";
 }
 switch($error){
 	case 1:
 			echo "";
 	break;
 	case 2:
 			echo "";
 	break;
 	case 3:
 			echo "";
 	break;
 	case 4:
 			echo "";
 	break;
 	case 6:
 			echo "";
 	break;
 	case 7:
 			echo "";
 	break;
 	
 }


  ?>