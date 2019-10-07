<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
 <form action="3 29 313.php" method="post">
	 <table border="1">
		<tr>
			<td>员工姓名</td>
			<td><input type="text" name="yname"></td>
		</tr>
		<tr>
			<td>密码</td>
			<td><input type="password" name="ypwd"></td>
		</tr>
		<tr>
			<td>确认密码</td>
			<td><input type="password" name="yqpwd"></td>
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
			<td><input type="text" name="yemail"></td>
		</tr>
		<tr>
			<td>电话号码</td>
			<td><input type="tel" name="ytel"></td>
		</tr>
		<tr>
			<td><input type="submit" value="提交"></td>
			<td></td>
		</tr>

	 </table>
 </form>
 </body>
 </html>