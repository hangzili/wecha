<?php
	header('content-type:text/html;charset=utf-8');
	$q=array(
		array("username"=>"小明","sex"=>"男","age"=>20),
		array("username"=>"小白","sex"=>"男","age"=>16),
		array("username"=>"小黑","sex"=>"男","age"=>22),

	);
	$q[1]=array("username"=>"小白","sex"=>"男","age"=>20);
	$q[2]=array("username"=>"小黑","sex"=>"男","age"=>20);
?>
<table border="1">
	<tr>
		<td>姓名</td>
		<td>性别</td>
		<td>年龄</td>
	</tr>
	<?php foreach ($q as $a=>$s){ ?>
	<tr>
		<td><?php echo $s['username'] ?></td>
		<td><?php echo $s['sex'] ?></td>
		<td><?php echo $s['age'] ?></td>
	</tr>
	<?php } ?>
</table>
