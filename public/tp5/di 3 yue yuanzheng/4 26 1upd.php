<?php 
	$b_id=$_GET['b_id'];
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select * from book where b_id='$b_id'";
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
 	<form action="4 26 1upd_do.php" method="post">
 		<input type="hidden" value="<?php echo $arr['b_od'] ?>" name="hid">
 		书名：<input type="text" name="b_name" value="<?php echo $arr['b_name'] ?>"><br>
 		分类：<select>
 					<?php 
 						$sql2="select * from cate";
						$res2=mysqli_query($link,$sql2);
						while($arr2=mysqli_fetch_assoc($res2)){
 					 ?>
 					<option <?php if($arr2['c_id']==$arr['c_id']){ echo "selected";} ?>><?php echo $arr2['c_name'] ?></option>
 					<?php } ?>
 			  </select>
 			  <input type="submit" value="修改">
 	</form>
 </body>
 </html>