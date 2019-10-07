<?php 
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select * from student where id=$id";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res)
 ?>
 
 	<form action="4 21 lian update2.php" method="post">
		<table>
			<tr>
				<td>姓名</td>
				<td><input type="text" name="c_name" value="<?php echo $arr['b_name'] ?>"></td>
			</tr>
			<tr>
				<td>性别</td>
				<td>
					<input type="radio" name="b_sex" value="1" <?php if($arr['b_sex']==1){ echo "checked";} ?>>男
					<input type="radio" name="b_sex" value="0" <?php if($arr['b_sex']==0){ echo "checked";} ?>>女

				</td>
			</tr>
			<tr>
				<td>爱好</td>
				<td>
					<?php $array=explode(',',$arr['b_hobby']); ?>
					<input type="checkbox" name="b_hobby" value="1" <?php if(in_array('0',$array)){ echo "checked";} ?>>读书
					<input type="checkbox" name="b_hobby" value="2" <?php if(in_array('1',$array)){ echo "checked";} ?>>听音乐
					<input type="checkbox" name="b_hobby" value="3" <?php if(in_array('2',$array)){ echo "checked";} ?>>打篮球
				</td>
			</tr>
			 <tr>
			 	<td>班级</td>
			 	<td>
			 	<?php  
			 			$link=mysqli_connect('127.0.0.1','root','','xxoo');
			 			$sql="select c_name from class";
			 			//var_dump ($sql);
			 			$res=mysqli_query($link,$sql);
			 			while($arr=mysqli_fetch_assoc($res)){
			 				$array[]=$arr;
			 			}
			 			
			 		 ?>
				 		<select name="b_class">
				 		<?php foreach($array as $k=>$v){
						 ?>
				 			<option>
								<?php echo $v['c_name'] ?>
				 			</option>
				 			<?php } ?>
				 		</select>
				 		
			 	</td>
			 </tr>
			 <tr>
			 	<td><input type="submit" value="添加"></td>
			 	<td></td>
			 </tr>
		</table>
	</form>