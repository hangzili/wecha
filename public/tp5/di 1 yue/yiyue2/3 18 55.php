<?php
	header('content-type:text/html;charset=utf-8');
	$q=array(
		array('unermane'=>'小明','sex'=>'男','age'=>20),
		array('unermane'=>'小白','sex'=>'男','age'=>19),
		array('unermane'=>'小黑','sex'=>'男','age'=>22),
			);
	//$q['0']=array('unermane'=>'小明','sex'=>'男','age'=>20,'tel'=>123458);
	$q['1']=array('unermane'=>'小白','sex'=>'男','age'=>19,'tel'=>5432158);
	$q['2']=array('unermane'=>'小黑','sex'=>'男','age'=>22,'tel'=>5432358);
	$q[0]['tel']=(111111111);

?>
<table border="1">
	<tr>
		<td>姓名</td>
		<td>性别</td>
		<td>男</td>
		<td>电话</td>
	</tr>
	<?php foreach($q as $a=>$s){ ?>
	<tr>
		<td><?php echo $s['unermane']?></td>
		<td><?php echo $s['sex']?></td>
		<td><?php echo $s['age']?></td>
		<td><?php echo $s['tel']?></td>
	</tr><?php } ?>
</table>