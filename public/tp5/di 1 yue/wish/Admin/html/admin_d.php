<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','wish');
	$sql="select * from admine_add where id='$id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	//修改页面
?>
<form name="login"  action="admin_a.php" method="post">
	<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
<table border="0"    cellspacing="20" cellpadding="0">
  <tr>
    <td>用户名：</td>
    <td><input   type="text" name="username" class="txt"/ value="<?php echo $arr['username'];?>"></td>
  </tr>
  <tr>
    <td>密码：</td>
    <td><input  type="password" name="pwd"  class="txt"/ value="<?php echo $arr['pwd'];?>"></td>
  </tr>
  <tr>
    <td>性别：</td>
    <td>
		<?php if($arr['sex']=="男"){ ?>
	<input   type="radio"  name="sex" value="男" value="<?php echo $arr['sex'];?>" checked>男
	<input   type="radio"  name="sex" value="女"  value="<?php echo $arr['sex'];?>">女</td>
		<?php }else { ?>
	<input   type="radio"  name="sex" value="男" value="<?php echo $arr['sex'];?>">男
	<input   type="radio"  name="sex" value="女"  value="<?php echo $arr['sex'];?>" checked>女</td>
		<?php }?>
  </tr>
  <tr>
    <td>自我介绍：</td>
    <td>
     <textarea cols="11" rows="5" name="introduce"><?php echo  $arr['introduce'];?></textarea>
  </tr>
  <tr>
    <td>薪资：</td>
    <td>
      <input type="text" name="money" value="<?php echo $arr['money'];?>">
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
    <td><input  type="submit" value="修改"  class="sub"/><input  type="reset" value="重 置"  class="res"/></td>
  </tr>
</table>

</form>