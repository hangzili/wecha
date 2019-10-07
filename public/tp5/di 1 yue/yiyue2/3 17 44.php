<?php
	header('content-type:text/html;charset=utf-8');
	
	$a=['q'=>'hello','e'=>'hello','w'=>'hello'];
?>
<table border="1">
	<tr>
		<td>数据</td>
	</tr>
	<tr><?php foreach ($a as $d=>$y) { ?>
		<td><?php echo $y ?></td>
	</tr><?php } ?>
</table>