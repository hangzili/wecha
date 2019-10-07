<?php
	header('content-type:text/html;charset=utf-8');
	$q=array(
		array('张三','男',18),
		array('小明','女',18),
		array('小白','女',18),
	);
?>
	<table border="1">
		<tr>
			<td>姓名</td>
			<td>性别</td>
			<td>年龄</td>
		</tr>
		<?php foreach ($q as $w=>$e) { ?>
		<tr>
			<td><?php echo $e['0'] ?></td>
			<td><?php echo $e['1'] ?></td>
			<td><?php echo $e['2'] ?></td>
		</tr><?php } ?>

	</table>