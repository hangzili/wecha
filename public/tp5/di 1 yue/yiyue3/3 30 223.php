<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from student2 where id='$id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);

?>
<form action="3 30 224.php" method="post">
<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
<table border="1">
	<tr>
		<th>学生姓名</th>
		<td><input type="text" name="sname" value="<?php echo $arr['sname'];?>"></td>
	</tr>
	<tr>
		<th>学生性别</th>
		<td><?php if($arr['ssex']=="男"){ ?>
			<input type="radio" name="ssex" value="男" checked>男
			<input type="radio" name="ssex" value="女">女
			<?php }else { ?>
			<input type="radio" name="ssex" value="男">男
			<input type="radio" name="ssex" value="女" checked>女
			<?php } ?>
		</td>
	</tr>
	<tr>
		<th>学生介绍</th>
		<td><textarea name="sdesc"><?php echo $arr['sdesc'];?></textarea></td>
	</tr>
	<tr>
		<th>是否升班</th>
		<td><?php if($arr['is_shengban']=="是"){ ?>
			<input type="radio" name="is_shengban" value="是" checked>是
			<input type="radio" name="is_shengban" value="否">否
			<?php }else {?>
			<input type="radio" name="is_shengban" value="是">是
			<input type="radio" name="is_shengban" value="否" checked>否
			<?php }?>
		</td>
	</tr>
	<tr>
		<th><input type="submit" value="修改"></th>
		<td></td>
	</tr>

</table>
</form>