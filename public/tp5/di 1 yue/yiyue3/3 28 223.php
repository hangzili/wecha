<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from zhousia where id='$id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	
?>
<form action="3 28 224.php" method="post">
<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
		<table border="1">
			<tr>
				<td>姓名</td>
				<td><input type="text" name="nname" value="<?php echo $arr['nname'];?>"></td>
			</tr>
			<tr>
				<td>性别</td>
				<td><?php if($arr['nradio']){ ?>
					<input type="radio" name="nradio" value="男" checked>男
					<input type="radio" name="nradio" value="女">女
					<?php } else { ?>
					<input type="radio" name="nradio" value="男">男
					<input type="radio" name="nradio" value="女" checked>女
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td>年龄</td>
				<td><input type="text" name="nage" value="<?php echo $arr['nage'];?>"></td>
			</tr>
			<tr>
				<td>状态</td>
				<td>
					<input type="radio" name="zhuanga" value="正常">正常
					<input type="radio" name="zhuangb" value="冻结">冻结
					
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="修改"></td>
				<td><input type="reset"></td>
			</tr>
			
		</table>
	</form>