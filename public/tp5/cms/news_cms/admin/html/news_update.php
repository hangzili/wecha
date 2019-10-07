<?php 
	$n_id=$_GET['n_id'];
	$link=mysqli_connect('127.0.0.1','root','','18099');
	$sql="select * from news where n_id='$n_id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	//修改页面

 ?>
 <form name="login"  action="news_update_do.php" method="post">
<input type="hidden" name="n_id" value="<?php echo $arr['n_id'] ?>">
<table border="0"    cellspacing="10" cellpadding="0">
  <tr>
    <td>新闻标题：</td>
    <td><input   type="text" name="n_title" class="txt" value="<?php echo $arr['n_title'] ?>"/></td>
  </tr>
  <tr>
    <td>新闻内容：</td>
    <td>
        <textarea  name="n_content" class="textarea"/>
			   <?php echo $arr['n_content'] ?>
    	   </textarea>
    </td>
  </tr>
  <tr>
    <td>添加人：</td>
    <td><input   type="text"  name="n_man"  class="txt"  value="<?php echo $arr['n_man'] ?>"/></td>
  </tr>
  <tr>
    <td>时间</td>
    <td><input type="text" name="n_time" value="<?php echo date("Y-m-d H:i:s",$arr['n_time']) ?>"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <input  type="submit" value="修改"  class="sub"/><input  type="reset" value="重 置"  class="res"/></td>
  </tr>
</table>

</form>
