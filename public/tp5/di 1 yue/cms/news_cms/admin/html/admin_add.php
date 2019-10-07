<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../css/public.css">
</head>

<body>

<div  id="main">
<h2>管理员添加</h2>
<form name="login"  action="admin_add_do.php" method="post">
<table border="0"    cellspacing="20" cellpadding="0">
  <tr>
    <td>用户名：</td>
    <td><input   type="text" name="username" class="txt"/></td>
  </tr>
  <tr>
    <td>密码：</td>
    <td><input  type="password" name="psd"  class="txt"/></td>
  </tr>
  <tr>
    <td>性别：</td>
    <td>
    <input   type="radio"  name="sex" value="男"  checked="checked"/>男
    <input   type="radio"  name="sex" value="女" />女</td>
  </tr>
    <tr>
    <td>爱好：</td>
    <td>
    <input   type="checkbox" name="nhobby[]" value="上网"/>上网
    <input   type="checkbox" name="nhobby[]" value="体育"/>体育
    <input   type="checkbox"  name="nhobby[]" value="学习"/>学习
    </td>
  </tr>
      <tr>
    <td>城市：</td>
    <td>
    <select name="city"  class="s1">
    	<option value="北京">北京</option>
        <option value="上海">上海</option>
        <option value="南京">南京</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input  type="submit" value="添 加"  class="sub"/><input  type="reset" value="重 置"  class="res"/></td>
  </tr>
</table>

</form>
</div>
</body>
</html>
