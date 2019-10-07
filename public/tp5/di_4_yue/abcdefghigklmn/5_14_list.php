<?php 
	include_once('5_14_class.php');
	$a=new mysql;
	mysql::$table='admina';
	$b=$a->selec('*')->limit(0,10)->que(2);


	$p= empty($_GET['p'])?"1":$_GET['p'];
	$page_num= 5;
	$page=($p-1) * $page_num;
	$count = $a->selec('count(*) nums')->que(1); 
	 $total = ceil($count['nums']/$page_num);
	//var_dump($count);
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<table border="1">
 		<tr>
 			<td>ID</td>
 			<td>姓名</td>
 			<td>电话</td>
 			<td>爱好</td>
 			<td>操作</td>
 		</tr>
 <?php foreach($b as $value){ ?>
 		<tr>
 			<td><?php echo $value['c_id'] ?></td>
 			<td><?php echo $value['c_name'] ?></td>
 			<td><?php echo $value['c_tel'] ?></td>
 			<td><?php echo $value['c_hobby'] ?></td>
 			<td>
 				<a href="5_14_del.php?c_id=<?php echo $value['c_id'] ?>">删除</a>
 				<a href="">修改</a>
 			</td>
 		</tr>
 	<?php } ?>
 		<tr>
 			<td colspan="5">
<?php 
	include_once('5_14_classb.php');
	$ac=new Page;
	$bc=$ac->simplePage($p,$total,1);
	echo $bc;
 ?>
 			</td>
 		</tr>
 	</table>
 </body>
 </html>