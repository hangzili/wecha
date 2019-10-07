
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../css/public.css">
</head>
					<!-- 管理员添加 -->
<body>
<div  id="main">
<h2>管理员添加</h2>
<form name="login"  action="admin_do.php" method="post">
<table border="0"    cellspacing="20" cellpadding="0">
  <tr>
    <td>用户名：</td>
    <td><input   type="text" name="nname" class="txt"/></td>
  </tr>
  <tr>
    <td>密码：</td>
    <td><input  type="password" name="npwd"  class="txt"/></td>
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
     <textarea cols="11" rows="5" name="nint"></textarea>
  </tr>
  <tr>
    <td>薪资：</td>
    <td>
      <input type="text" name="nmoney">
    </td>
  </tr>
  <tr>
    <td>城市：</td>
    <td>
      <input type="text" name="city">
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
