<?php
	header('content-type:text/html;charset=utf-8');
	$q=array(
		array('张三','男',16),
		array('小明','女',22),
		array('小白','女',23),
		array('小小','女',17),
	);
?>
<table border="1">
	<tr>
		<td>姓名</td>
		<td>性别</td>
		<td>年龄</td>
	</tr>
	<?php foreach ($q as $e=>$r){?>
	<tr>
		<td><?php echo $r['0']?></td>
		<td><?php echo $r['1']?></td>
		<td><?php echo $r['2']?></td>
	</tr>
	<?php } ?>
</table>
<table border="1">
	<tr>
		<td>姓名</td>
		<td>性别</td>
		<td>年龄</td>
	</tr>
	<?php foreach ($q as $e=>$r){?>
		<tr><?php foreach ($r as $c=>$v){?>
			<td><?php echo $v?></td>
				<?php } ?>
		</tr>
	<?php } ?>
</table> 
		