<?php
	header('content-type:text/html;charset=utf-8');
	$q=array(
		array('unermane'=>'小明','sex'=>'男','age'=>20),
		array('unermane'=>'小白','sex'=>'男','age'=>19),
		array('unermane'=>'小黑','sex'=>'男','age'=>22),
			);
	




?>


<table border="1">
	<tr>
		<td>姓名</td>
		<td>性别</td>
		<td>年龄</td>
	</tr>
	<?php foreach ($q as $q1=>$q2) { ?>
	<tr>
		<td><?php echo $q2['unermane']?></td>
		<td><?php echo $q2['sex']?></td>
		<td><?php echo $q2['age']?></td>
	</tr><?php } ?>
</table>