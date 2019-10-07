<?php 
	 $c_id=$_GET['c_id'];
	 $link=mysqli_connect('127.0.0.1','root','','18099');//修改页面
	 $sql="select * from category where c_id='$c_id'";
	 $res=mysqli_query($link,$sql);
	 $arr=mysqli_fetch_assoc($res);
	 session_start();//开启session
	 date_default_timezone_set("PRC");
	 //var_dump("$arr");
 ?>
 <form name="login"  action="cate_xiugai_do.php" method="post">
 <input type="hidden" name="c_id" value=<?php echo $arr['c_id'] ?>>
 <input type="hidden" name="old_name" value=<?php echo $arr['c_name']?>>
	<table border="0"    cellspacing="10" cellpadding="0">
		  <tr>
			<td>分类名称：</td>
			<td><input   type="text" name="c_name" value="<?php echo $arr['c_name'] ?>" class="txt"/></td>
		  </tr>
			<tr>
			<td>修改人：</td>
			<td><input   type="text"  name="c_man"  value="<?php echo $_SESSION['username'] ?>" class="txt"/></td>
		  </tr>
		  <tr>
		  	<td>时间</td>
		  	<td><input type="text" name="c_time" value="<?php echo date("Y-m-d H:i:s",time()) ?>"></td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td><input  type="submit" value="修改"  class="sub"/><input  type="reset" value="重 置"  class="res"/></td>
		  </tr>
	</table>
</form>