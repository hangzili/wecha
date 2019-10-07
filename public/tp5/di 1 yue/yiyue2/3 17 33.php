<?php
	header("content-type:text/html;charset=utf-8");
	$a1=array('ning'=>'张三','xing'=>'男','nian'=>'18');
?>
<table border="1">
	<tr>
		<td>数据</td>
	</tr>
	<tr><?php foreach($a1 as $q=>$w){?>
		<td><?php echo $w ?></td>
	</tr><?php }?>

	
	
</table>