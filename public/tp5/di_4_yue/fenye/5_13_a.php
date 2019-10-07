<?php 
	$p=empty($_GET['p'])?"1":$_GET['p'];
	$page_num=5;
	$first=($p-1)*$page_num;

	include_once('Mysql.class.php');
	$m=new Mysql;
	$list=$m->select('admina','*')->limit($first,$page_num)->query_fetch(2);

	$count=$m->select('admina','count(*) nums')->query_fetch(1);
	$total=ceil($count['nums']/$page_num);

	
 ?>
 <table border="1" align="center">
 	<tr>
 		<td>ID</td>
 		<td>名称</td>
 		<td>电话</td>
 		<td>爱好</td>
 	</tr>
 <?php foreach($list as $value){ ?>
 	<tr>
 		<td><?php echo $value['c_id'] ?></td>
 		<td><?php echo $value['c_name'] ?></td>
 		<td><?php echo $value['c_tel'] ?></td>
 		<td><?php echo $value['c_hobby'] ?></td>
 		<td></td>
 	</tr>
 <?php } ?>
 	<tr>
 		<td colspan="5">
 <?php 
 		include_once('5_13_b.php');
 		$pa=new page;
 		// echo $pa->simplePage($p,$total);
 		// echo $pa->numPage($p,$total);
 		echo $pa->fixedPage($p,$total);
  ?>
 		</td>
 	</tr>
 </table>