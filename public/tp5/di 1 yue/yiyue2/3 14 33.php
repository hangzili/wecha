<?php
	header('content-type:text/html;charset=utf-8');
	$ming=$_POST['ming'];
	$jia=$_POST['jia'];
	$shi=$_POST['shi'];
	$gai=$_POST['gai'];
	if($shi=='是'){
		$q='连载中';
	}else {
		$q='完成';
	}
?>
<table border="1">
	<tr>
		<td>课程名称</td>
		<td>课程价格</td>
		<td>是否连载</td>
		<td>该课程讲师</td>
		<td>操作</td>
	</tr>
	<tr>
		<td><?php echo $ming?></td>
		<td><?php echo $jia?></td>
		<td><?php echo $q?></td>
		<td><?php echo $gai?></td>
		<td><a href="">放入回收站</a></td>
	</tr>
</table>
