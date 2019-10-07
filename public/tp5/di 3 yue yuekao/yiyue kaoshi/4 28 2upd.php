<?php 
	$c_id=$_GET['c_id'];
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select * from ccc where c_id='$c_id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<form action="4 28 2upd_do.php" method="post">
 	<input type="hidden" name="c_id" value="<?php echo $arr['c_id'] ?>">
 		姓名：<input type="text" name="c_name" value="<?php echo $arr['c_name'] ?>"><br>
 		性别：<input type="radio" value="0" name="c_sex" <?php if($arr['c_sex']==0){echo "checked";} ?>>女
		  	  <input type="radio" value="1" name="c_sex" <?php if($arr['c_sex']==1){echo "checed";} ?>>男<br><br>
 		爱好 <?php $brr=explode(",",$arr['c_hobby']) ?>
				<input type="checkbox" name="c_hobby[]" value="0" <?php if(in_array(0,$brr)){ echo 'checked';} ?>>唱歌
		  		<input type="checkbox" name="c_hobby[]" value="1" <?php if(in_array(1,$brr)){ echo 'checked';} ?>>跳舞
		  		<input type="checkbox" name="c_hobby[]" value="2" <?php if(in_array(2,$brr)){ echo 'checked';} ?>>游泳<br>

 		班级：<select name="c_class">
				<option value="0" <?php if($arr['c_class']==0){echo "selected";} ?>>1班</option>		
				<option value="1" <?php if($arr['c_class']==1){echo "selected";} ?>>2班</option>		
				<option value="2" <?php if($arr['c_class']==2){echo "selected";} ?>>3班</option>		
		 	  </select><br>
		 	  <input type="submit" value="修改">
 	</form>
 </body>
 </html>