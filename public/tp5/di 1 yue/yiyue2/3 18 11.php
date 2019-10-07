<?php
	header('content-type:text/html;charset=utf-8');
	$q=array(
		array(90,90,90),
		array(90,95,100),
		array(87.5,90,100),
	);
?>
<table border="1">
	<tr>
		<td>第一周理论</td>
		<td>第二周理论</td>
		<td>第三周理论</td>
	</tr>
	<?php foreach ($q as $e=>$r){?>
	<tr>
		<td><?php echo $r['0'] ?></td>
		<td><?php echo $r['1'] ?></td>
		<td><?php echo $r['2'] ?></td>
	</tr>
	
	<?php }?>
	
</table>