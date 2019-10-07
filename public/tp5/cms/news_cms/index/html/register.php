<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>前台首页</title>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/public.css">
<style>
#header{ height:92px; background:none;}
#main  h2{ margin-left:0px; line-height:50px; font-size:20px;}
.article{margin-left:-50px;}

a{color:#087eac;}
</style>
</head>

<body>
<div id="header">
<img src="../images/logo1.png" alt="logo"/>
<ul>
    <li><a href="#" style="color:#087eac;">会员注册</a>/</li>
    <li><a href="#" style="color:#087eac;">登陆</a></li>
</ul>
</div>


<div>
<div  id="main">
<h2 align="center">欢迎注册新用户</h2>
<div class="article">

<form name="login"  action="register_do.php" method="post">

<table border="0"    cellspacing="20" cellpadding="0" align="center">
  <tr>
    <td>用户名：</td>
    <td><input   type="text" name="user_name" class="txt" width="2"/></td>
  </tr>
  <tr>
    <td>密码：</td>
    <td><input  type="password" name="user_pwd"  class="txt"/></td>
  </tr>
  <tr>
    <td>电话：</td>
    <td><input  type="tel" name="user_tel"  class="txt"/></td>
  </tr>
  <tr>
    <td>邮箱：</td>
    <td><input  type="email" name="user_email"  class="txt"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input  type="submit" value="添 加"  class="sub"/><input  type="reset" value="重 置"  class="res"/></td>
  </tr>
</table>

</form>

</div>
</div>


<div class="blank20"></div>

<?php 

    include('./foot.php');
 ?>

</body>
</html>
