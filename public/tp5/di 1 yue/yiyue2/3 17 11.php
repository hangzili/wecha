 <?php
	header('content-type:text/html;charset=utf-8');
	$zhang=empty($_POST['zhang'])?"":$_POST['zhang'];
	$mi=empty($_POST['mi'])?"":$_POST['mi'];
	$dian=empty($_POST['dian'])?"":$_POST['dian'];
//4-8位	Strlen()  获取字符串的长度
//手机位11位 纯数字Is_numeric() 检测变量是否为数字或数字字符串
?>
<table border="1">
	<tr>
		<td>学生账号</td>
		<td>学生电话</td>
		<td>学生密码</td>
		<td>操作</td>
	</tr>
	<tr>
		<td><?php
			if(strlen($zhang)<4){
				echo '4-8';
			}else if(strlen($zhang)>8){
				echo '4-8';
			}else {
				echo "$zhang";
			}
		
		?></td>
		<td><?php
			if(strlen($dian)!=11){
				echo "为11位纯数字";
			}else if(is_numeric($dian)<1){
				echo "为11位纯数字";
			}else {
				echo "$dian";
			}
		
		?></td>
		<td><?php
			if(strlen($mi)<6){
				echo "必须6位以上";
			}else {
				echo "$mi";
			}
		
		?></td>
		<td></td>
	</tr>
</table>
	