<?php 
header("content-type:text/html;charset=utf-8");
$id=$_GET['id'];
$link=mysqli_connect('127.0.0.1','root','root','wish_new');
$sql="select * from admin where id='$id'";
$res=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($res);

?>
<form name="login"  action="admin_del_xgdo.php" method="post">
<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
<table border="0"    cellspacing="20" cellpadding="0">
  <tr>
    <td>用户名：</td>
    <td><input   type="text" name="nname" value="<?php echo $arr['nname'];?>" class="txt"/></td>
  </tr>
  <tr>
    <td>密码：</td>
    <td><input  type="password" name="npwd" value="<?php echo $arr['npwd'];?>"  class="txt"/></td>
  </tr>
  <tr>
    <td>性别：</td>
    <td>
    <input   type="radio"  name="nsex" value="男"/>男
    <input   type="radio"  name="nsex" value="女" />女</td>
  </tr>
  <tr>
    <td>自我介绍：</td>
    <td>
     <textarea cols="11" rows="5" name="nint"><?php echo $arr['nint'];?></textarea>
  </tr>
  <tr>
    <td>薪资：</td>
    <td>
      <input type="text" name="nmoney" value="<?php echo $arr['nmoney'];?>">
    </td>
  </tr>
  <tr>
    <td>城市：</td>
    <td>
      <input type="text" name="city" value="<?php echo $arr['city'];?>">
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input  type="submit" value="添 加"  class="sub"/><input  type="reset" value="重 置"  class="res"/></td>
  </tr>
</table>

</form>