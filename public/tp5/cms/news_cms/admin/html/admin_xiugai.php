<?php 
$id=$_GET['id'];
$link=mysqli_connect('127.0.0.1','root','','18099');
$sql="select * from admin where id='$id'";
$res=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($res);
//echo $arr['city']

 ?>
 <form name="login"  action="admin_xiugai_do.php" method="post">
 <input type="hidden" name="id" value="<?php echo $arr['id']?>">;
<table border="0"    cellspacing="20" cellpadding="0">
  <tr>
    <td>用户名：</td>
    <td><input   type="text" name="username" class="txt" value="<?php echo $arr['username']?>"/></td>
  </tr>
  <tr>
    <td>密码：</td>
    <td><input  type="password" name="psd"  class="txt" value="<?php echo $arr['pwd']?>"/></td>
  </tr>
  <tr>
    <td>性别：</td>
    <td>

 <input   type="radio"  name="sex" value="0" <?php if($arr['sex']==0){ echo "checked";} ?>/>男
 <input   type="radio"  name="sex" value="1" <?php if($arr['sex']==1){ echo "checked";} ?>/>女



  </tr>
    <tr>
    <td>爱好：</td>
    <td>


   <?php $array=explode(',',$arr['hobby']); ?>
    <input   type="checkbox" name="nhobby[]" value="0" <?php if(in_array('0',$array)){ echo "checked";} ?>/>上网
    <input   type="checkbox" name="nhobby[]" value="1" <?php if(in_array('1',$array)){ echo "checked";} ?>/>体育
    <input   type="checkbox"  name="nhobby[]" value="2" <?php if(in_array('2',$array)){ echo "checked";} ?>/>学习
	


    </td>
  </tr>
      <tr>
    <td>城市：</td>
    <td>
    <select name="city"  class="s1">
    	<option value="0"<?php  if($arr['city']==0){ echo "selected";} ?>>北京</option>
        <option value="1"<?php  if($arr['city']==1){ echo "selected";} ?>>上海'</option>
        <option value="2"<?php  if($arr['city']==2){ echo "selected";} ?>>南京</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input  type="submit" value="修改"  class="sub"/><input  type="reset" value="重 置"  class="res"/></td>
  </tr>
</table>

</form>