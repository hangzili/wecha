<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from book2 where id='$id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
?>
<form action="3 29 445.php" method="post">
<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
		<table border="1">
			<tr>
				<td>申请人姓名</td>
				<td><input type="text" name="sname" value="<?php echo $arr['sname'];?>"></td>
			</tr>
			<tr>
				<td>申请银行</td>
				<td>
					<select name="yinhang">
						<option>建设银行</option>
						<option>工商银行</option>
						<option>农业银行</option>
						<option>人民银行</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>银行卡号</td>
				<td><input type="text" name="number" value="<?php echo $arr['number'];?>"></td>
			</tr>
			<tr>
				<td>申请额度</td>
				<td><input type="text" name="money" value="<?php echo $arr['money'];?>"></td>
			</tr>
			<tr>
				<td>申请人手机号</td>
				<td><input type="text" name="tel" value="<?php echo $arr['tel'];?>"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" value="修改"></td>
			</tr>
		</table>
		</form>