<?php 
	header("content-type:text/html;charset=utf-8");
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from booka where id='$id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	
	
?>
 <form action="3 28 334.php" method="post">
 <input type="hidden" name="id" value="<?php echo $arr['id'];?>">
 <table border="1">
	<tr>
		<td>图书名称</td>
		<td><input type="text" name="tname" value="<?php echo $arr['tname'];?>"></td>
	</tr>
	<tr>
		<td>图书作者</td>
		<td><input type="text" name="tauthor" value="<?php echo $arr['tauthor'];?>"></td>
	</tr>
	<tr>
		<td>图书价格</td>
		<td>
			<input type="text" name="tprice" value="<?php echo $arr['tprice'];?>">
		</td>
	</tr>
	<tr>
		<td>分类名称</td>
		<td>
			<select name="tid">
				<option>西游记</option>
				<option>红楼梦</option>
				<option>西游记</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>图书描述</td>
		<td>
			<textarea name="ttext"> <?php echo $arr['ttext'];?></textarea>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="修改"></td>
	</tr>
	
 </table>
 </form>