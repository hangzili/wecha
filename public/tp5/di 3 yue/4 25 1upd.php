<?php 
	$s_id=$_GET['s_id'];
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select * from student3 where s_id='$s_id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
 ?>
 <form action="4 25 1upd_do.php" method="post">
 <input type="hidden" name="s_id" value="<?php echo $arr['s_id'] ?>">
 	姓名：<input type="text" name="s_name" value=<?php echo $arr['s_name'] ?>><br>
 	性别：<input type="radio" name="s_sex" value="0" <?php if($arr['s_sex']==0){ echo "checked";} ?>>女
 	 	  <input type="radio" name="s_sex" value="1" <?php if($arr['s_sex']==1){ echo "checked";} ?>>男<br>
 	 	  <?php $aihao=explode(",",$arr['s_hobby']) ?>
 	爱好：<input type="checkbox" name="s_hobby[]" value="0" <?php if(in_array('0',$aihao)){ echo "checked";} ?>>读书
 		  <input type="checkbox" name="s_hobby[]" value="1" <?php if(in_array('1',$aihao)){ echo "checked";} ?>>听音乐
 	 	  <input type="checkbox" name="s_hobby[]" value="2" <?php if(in_array('2',$aihao)){ echo "checked";} ?>>打篮球<br>
 	<input type="submit" value="修改">
 </form>