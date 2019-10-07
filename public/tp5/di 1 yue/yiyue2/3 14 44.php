<?php
	header('content-type:text/html;charset=utf-8');
	$ming=$_POST['ming'];
	$shu=$_POST['shu'];
	$huai=$_POST['huai'];
	$ban=$_POST['ban'];
	if($huai='是'){
		$q='操';
	}
?>
<table border="1">
	<tr>
		<td>名称</td>
		<td>数量</td>
		<td>是否损坏</td>
		<td>班级</td>
		<td>操作</td>
	</tr>
	<tr>
		<td><?php echo $ming?></td>
		<td><?php echo $shu?></td>
		<td><?php echo $q?></td>
		<td><?php echo $ban?></td>
		<td><a href="">删除</a></td>
	</tr>
</table>
