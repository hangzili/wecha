<font size="" color="">  </font><?php
	header('content-type:text/html;charset=utf-8');
	 
	 
	 //$a=array('啥子','傻子','沙子','啥字');
	

	//$a=['啥子','傻子','沙子','啥字'];
	  
	  //改
	//  $a[3]='宝马';
	 //  print_r ($a);
	


	//print_r ($a);

	// echo $a{2};

	// 改  $a{4}="大傻子";
	//   print_r ($a);
	//
	// 删	unset($a{2});
		//	print_r($a);

	  //  $a[4]="紫砂";
	    // print_r($a);

	//	echo $a {1};

	//  $a{2}="经济界";
	//    print_r  ($a);

	$a1=array('name'=>'名字','age'=>'年龄','sex'=>'男');

	//  echo $a1 {age};

	//$a1{'name'}='姓名';
	//print_r($a1);

	//$a1{'src'}='asd';
	//print_r($a1);

	//foreach($a1 as $q=>$e){
	//		echo $e.'<br>';
	
	// }

	// unset($a1{'name'});
	// print_r($a1);


?>
<table border="1">
	<tr>
		<td>姓名</td>
		<td>年龄</td>
		<td>性别</td>
	</tr>
	<tr>
	<?php foreach($a1 as $q=>$e){?>
		<td><?php echo $e ?></td>
		<?php }?>
	</tr></table>