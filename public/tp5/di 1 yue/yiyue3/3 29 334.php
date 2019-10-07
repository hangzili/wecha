<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from yuan1";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
?>
<form action="3 29 335.php" method="post">
<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
	 <table border="1">
		<tr>
			<td>员工姓名</td>
			<td><input type="text" name="yname" value="<?php echo $arr['yname'];?>"></td>
		</tr>
		<tr>
			<td>密码</td>
			<td><input type="password" name="ypwd" value="<?php echo $arr['ypwd'];?>"></td>
		</tr>
		<tr>
			<td>确认密码</td>
			<td><input type="password" name="yqpwd" value="<?php echo $arr['yqpwd'];?>"></td>
		</tr>
		<tr>
			<td>年龄</td>
			<td>
				<select name="year">
				<?php for($i=18;$i<=35;$i++) {?>
					<option><?php echo "$i";?></option>
				<?php }?>
					
				</select>
			</td>
		</tr>
		<tr>
			<td>性别</td>
			<td>
				<input type="radio" value="男" name="yradio">男
				<input type="radio" value="女" name="yradio">女
			</td>
		</tr>
		<tr>
			<td>邮箱</td>
			<td><input type="text" name="yemail" value="<?php echo $arr['yemail'];?>"></td>
		</tr>
		<tr>
			<td>电话号码</td>
			<td><input type="tel" name="ytel" value="<?php echo $arr['ytel'];?>"></td>
		</tr>
		<tr>
			<td><input type="submit" value="修改"></td>
			<td></td>
		</tr>

	 </table>
 </form>