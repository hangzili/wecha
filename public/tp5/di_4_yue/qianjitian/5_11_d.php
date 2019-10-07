<?php 
	include_once('5_11_c.php');
	$a=new ada;
	$b= $a->select('c_id,c_name,c_hobby,c_tel','admina')->limit(0,10)->quer('2');
 ?>
<table border="1">
 	<tr>
 		<td>姓名</td>
 		<td>电话</td>
 		<td>爱好</td>
 		<td>操作</td>
 	</tr>
 	<?php foreach($b as $value){ ?>
 	<tr>
 		<td><?php echo $value['c_name'] ?></td>
 		<td><?php echo $value['c_tel'] ?></td>
 		<td><?php echo $value['c_hobby'] ?></td>
 		<td>
 			<a href="5_11_e.php?c_id=<?php echo $value['c_id'] ?>">删除</a>
 			<a href="5_11_f.php?c_id=<?php echo $value['c_id'] ?>">修改</a>
 		</td>
 	</tr>
 	<?php } ?>
 </table>