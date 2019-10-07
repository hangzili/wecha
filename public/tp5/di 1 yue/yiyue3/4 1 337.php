<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from one where id='$id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
?>
<form action="4 1 338.php" method="post">
<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
	<table border="1">
		<tr>
			<td>姓名</td>
			<td><input type="text" name="aname" value="<?php echo $arr['aname'];?>"></td>
		</tr>
		<tr>
			<td>性别</td>
			<td><?php if($arr['aradio']==="男"){ ?>
				<input type="radio" name="aradio" value="男" checked>男
				<input type="radio" name="aradio" value="女">女
				<?php } else { ?>
				<input type="radio" name="aradio" value="男">男
				<input type="radio" name="aradio" value="女" checked>女
				<?php }?>
			</td>
		</tr>
		<tr>
			<td>爱好</td>
			<td>
				<?php if($arr['nhoddy']=="游泳"){ ?>
				<input type="checkbox" name="ahoddy[]" value="游泳" checked>游泳
				<input type="checkbox" name="ahoddy[]" value="唱歌">唱歌
				<input type="checkbox" name="ahoddy[]" value="跳舞">跳舞
				<?php } else if($arr['nhoddy']=="唱歌"){ ?>
				<input type="checkbox" name="ahoddy[]" value="游泳">游泳
				<input type="checkbox" name="ahoddy[]" value="唱歌" checked>唱歌
				<input type="checkbox" name="ahoddy[]" value="跳舞">跳舞
				<?php } else { ?>
				<input type="checkbox" name="ahoddy[]" value="游泳">游泳
				<input type="checkbox" name="ahoddy[]" value="唱歌">唱歌
				<input type="checkbox" name="ahoddy[]" value="跳舞" checked>跳舞
				<?php }?>
			</td>
		</tr>
		<tr>
			<td>介绍</td>
			<td>
				<textarea name="atext"><?php echo $arr['atext'];?></textarea>
			</td>
		</tr>
		<tr>
			<td>省市</td>
			<td>
				<select name="asheng">
					<option>山西</option>
					<option>河北</option>
					<option>山东</option>
					<option>河南</option>
					<option>西藏</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><input type="submit" value="修改"></td>
			<td></td>
		</tr>
	</table>
	</form>