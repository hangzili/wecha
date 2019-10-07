<?php
	header('content-type:text/html;charset=utf-8');
	$yuan=$_POST['yuan'];
	$mi=$_POST['mi'];
	$ma=$_POST['ma'];
	$nian=$_POST['nian'];
	$xing=empty($_POST['xing'])?"":$_POST['xing'];
	$xiang=$_POST['xiang'];
	$dian=$_POST['dian'];

	$q=$yuan.",".$mi.",".$nian.",".$xing.",".$xiang.",".$dian."\n\r";
	$q21=file_put_contents('php.txt',$q,FILE_APPEND);
	
	
	
?>
<table>
	<tr>
		<td>员工</td>
		<td style="color:red"><?php echo $yuan?></td>
	</tr>
	<tr>
		<td>年龄</td>
		<td style="color:red"><?php
			if($nian<18){
				echo "18到35";
			}else if($nian>35){
				echo "18到35";
			}else {
				echo "$nian";
			}
			?></td>
	</tr>
	<tr>
		<td>性别</td>
		<td style="color:red"><?php echo $xing?></td>
	</tr>
	<tr>
		<td>邮箱</td>
		<td style="color:red"><?php echo $xiang?></td>
	</tr>
	<tr>
		<td>电话</td>
		<td style="color:red"><?php echo $dian?></td>
	</tr>
	</table>

	
	
	
	
 