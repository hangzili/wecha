<?php 
	include_once('5_11_c.php');
	$c_id=$_GET['c_id'];
	$a=new ada;
	$b= $a->select('c_id,c_name,c_hobby,c_tel','admina')->where('c_id','=',$c_id)->quer('1');
	//var_dump($b);
 ?>
 <form action="5_11_g.php" method="post">
 <input type="hidden" value="<?php echo $b['c_id'] ?>" name="c_id">
		姓名<input type="text" name="c_name" value="<?php echo $b['c_name'] ?>"><br>
		电话<input type="text" name="c_tel" value="<?php echo $b['c_tel'] ?>"><br>
		爱好<input type="text" name="c_hobby" value="<?php echo $b['c_hobby'] ?>"><br>
		<input type="submit" value="修改">
	</form>