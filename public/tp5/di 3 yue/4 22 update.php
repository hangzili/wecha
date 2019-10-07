<?php 
	$s_id=$_GET['s_id'];
	$link=mysqli_connect('127.0.0.1','root','','xo');
	$sql="select student.s_name,student.s_id,student.s_sex,student.s_hobby,student.c_id,class.id from student join class where s_id=$s_id";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);

 ?>
 <form action="4 22 update_do.php" method="post">
 <input type="hidden" name="s_id" value="<?php echo $arr['s_id'] ?>">
 <table>
 	<tr>
 		<td>姓名</td>
 		<td><input type="text" name="s_name" value=<?php echo $arr['s_name'] ?>></td>
 	</tr>
 	<tr>
 		<td>性别</td>
 		<td>
 			<input type="radio" name="s_sex" value="0" <?php if($arr['s_sex']==0){echo "checked";} ?>>女
 			<input type="radio" name="s_sex" value="1" <?php if($arr['s_sex']==1){echo "checked";} ?>>男
 		</td>
 	</tr>
 	<tr>
 		<td>爱好</td>
 		<td>
 			<?php $array=explode(',',$arr['s_hobby']); ?>
 			<input type="checkbox" name="s_hobby[]" value="0" <?php if(in_array('0',$array)){echo "checked";} ?>>读书
			<input type="checkbox" name="s_hobby[]" value="1" <?php if(in_array('1',$array)){echo "checked";} ?>>听音乐
			<input type="checkbox" name="s_hobby[]" value="2" <?php if(in_array('2',$array)){echo "checked";} ?>>打篮球
 		</td>
 	</tr>
 	<tr>
 		<td>班级</td>
 		<td>
 			<select>
 				<option value="0" <?php  if($arr['c_id']==1){ echo "selected";} ?>>1班</option>
 				<option value="1" <?php if($arr['c_id']==2){ echo "selected"; } ?>>2班</option>
 				<option value="2" <?php if($arr['c_id']==3){ echo "selected"; } ?>>3班</option>
 			</select3>
 		</td>
 	</tr>
 	<tr>
 		<td><input type="submit" value="修改"></td>
 		<td></td>
 	</tr>
 </table>
 </form>