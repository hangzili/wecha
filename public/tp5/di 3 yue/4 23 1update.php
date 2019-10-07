<?php 
	$s_id=$_GET['s_id'];
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select student2.s_id,class2.id,student2.s_name,student2.c_id,student2.s_sex,student2.s_hobby,class2.c_name from student2 join class2 ";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
 ?>
 <form action="4 23 1update_do.php" method="post">
 <input type="hidden" value="<?php echo $arr['s_id'] ?>" name="s_id">
 	姓名<input type="text" name="s_name" value="<?php echo $arr['s_name'] ?>"><br>
 	性别<input type="radio" name="s_sex" value="0" <?php if($arr['s_sex']==0){ echo "checked";} ?>>女
 		<input type="radio" name="s_sex" value="1" <?php if($arr['s_sex']==1){ echo "checked";} ?>>男<br>
 	
 	爱好 <?php $asd=explode(',',$arr['s_hobby']) ?>
 		<input type="checkbox" name="s_hobby[]" value="0" <?php if(in_array('0',$asd)){ echo 'checked';} ?>>读书
		<input type="checkbox" name="s_hobby[]" value="1" <?php if(in_array('1',$asd)){ echo 'checked';} ?>>听音乐	
		<input type="checkbox" name="s_hobby[]" value="2" <?php if(in_array('2',$asd)){ echo 'checked';} ?>>打篮球<br>
	班级
		<select>
			<?php 

			$link2=mysqli_connect('127.0.0.1','root','','xxoo');
			$sql2="select * from class2";
			$res2=mysqli_query($link2,$sql2);
			while($arr2=mysqli_fetch_assoc($res2)){

			 ?>
			<option <?php if($arr2['id']==$arr['c_id']){ echo "selected"; } ?>><?php echo $arr2['c_name'] ?></option>
			<?php } ?>
		</select><br>


	<input type="submit" value="修改">
 </form>