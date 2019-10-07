<?php
	header('content-type:text/html;charset=utf-8');
	$yuan=$_POST['yuan'];
	$mi=$_POST['mi'];
	$ma=$_POST['ma'];
	$nian=$_POST['nian'];
	$xing=empty($_POST['xing'])?"":$_POST['xing'];
	$xiang=$_POST['xiang'];
	$dian=$_POST['dian'];

	if(strlen($yuan)<12){
		echo '请输入4到8位';
	}else if(strlen($yuan)>24){
		echo '请输入4到8位';
	}else {
		echo	"$yuan";
	}
echo "<br>";

	if(strlen($mi)<6){
		echo '请输入密码6位以上';
	}else {
		echo "$mi";
	}
echo "<br>";

	$q12="@";
	if(substr_count($xiang,$q12)<1){
		echo '输入正确格式';
	}else {
		echo "$xiang";
	}
echo "<br>";

	if(empty($mi)){
		echo '密码不能为空';
	}else if($mi!=$ma) {
		echo '确认密码一致';
	}
echo "<br>";

	if(strlen($dian)!=11){
		echo '等于11';
	}else {
		echo "$dian";
	}

echo "<br>";
	echo $nian;
	
?>
<!-- <table>
	<tr>
		<td>员工姓名</td>
		<td style="color:red"><?php echo $yuan?></td>
	</tr>
	<tr>
		<td>年龄</td>
		<td style="color:red"><?php echo $nian?></td>
	</tr>
	<tr>
		<td>性别</td>
		<td style="color:red"><?php echo $xing?></td>
	</tr>
	<tr>
		<td>邮箱</td>
		<td style="color:red"><?php echo $you?></td>
	</tr>
	<tr>
		<td>电话</td>
		<td style="color:red"><?php echo $dian?></td>
	</tr>
</table> -->