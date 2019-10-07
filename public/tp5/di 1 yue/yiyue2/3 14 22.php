<?php
	header('content-type:text/html;charset=utf-8');
	$ming=$_POST['ming'];
	$dan=$_POST['dan'];
	$xing=$_POST['xing'];
	$ren=$_POST['ren'];

?>
名称：<?php echo $ming?><br>
单价：<?php echo $dan?><br>
型号：<?php echo $xing?><br>
添加人：<?php echo $ren?>

