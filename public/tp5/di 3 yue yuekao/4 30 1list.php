<?php 
	$p=empty($_GET['p'])?"1":$_GET['p'];
	$page=($p-1) * 2;

	$link=mysqli_connect('127.0.0.1','root','','xo');
	$sql="select staff.s_id,staff.s_name,staff.s_sex,staff.s_email,staff.s_tel,department.d_name from staff join department on staff.d_id=department.d_id limit $page,2";
	$res=mysqli_query($link,$sql);
	$array=array();
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}

	$sql2="select count(*) as con from staff";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	$asd=$arr2['con'];
	$title=ceil($asd/2);
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
 			<td>员工ID</td>
 			<td>姓名</td>
 			<td>性别</td>
 			<td>邮箱</td>
 			<td>电话</td>
 			<td>部门</td>
 			<td>操作</td>
 		</tr>
 	<?php foreach($array as $k=>$v){ ?>
 		<tr>
 			<td><?php echo $v['s_id'] ?></td>
 			<td><?php echo $v['s_name'] ?></td>
 			<td><?php 
 					if($v['s_sex']==1){
 						echo "男";
 					}else{
 						echo "女";
 					}

 			 ?></td>
 			<td><?php echo $v['s_email'] ?></td>
 			<td><?php echo $v['s_tel'] ?></td>
 			<td><?php echo $v['d_name'] ?></td>
 			<td>
 				<a href="4 30 1del.php?s_id=<?php echo $v['s_id'] ?>">删除</a>
 			</td>
 		</tr>
 		<?php } ?>
 	</table>
 </body>
 </html>
 <?php for($i=1;$i<=$title;$i++){ ?>
 <a href="4 30 1list.php?p=<?php echo $i ?>"><?php echo $i ?></a>
 <?php } ?>