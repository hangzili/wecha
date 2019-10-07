<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆</title>
<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>
<div id="login">
<form name="login"  action="login_do.php" method="post" onsubmit="return xxoo()">
<table width="300" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>用户名：</td>
    <td><input  name='username' type="text" class="login_txt" id="nid" onblur='uder()'/>
        <span id='a1'>*</span>
    </td>
  </tr>
  <tr>
    <td>密&nbsp;码：</td>
    <td><input name='pwd' type="password"  class="login_txt" id="pid" onblur='pwd()' />
        <span id='a2'>*</span>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="checkbox"  checked="checked" />一周免登陆     <a href="#">忘记密码？</a>    <a href="#">注册</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input  type="submit" value="登 陆" class="sub"/><input  type="reset" value="重 置"  class="res"/></td>
  </tr>
  <script type="text/javascript">
      function uder()
      {
        var nid=document.getElementById('nid').value;
        var a11=document.getElementById('a1');
        if(nid==""){
          a11.innerHTML='不能为空';
            return false;
        }else{
          a11.innerHTML='√';
          return true;
        }
      }
      function pwd()
      {
        var pida=document.getElementById('pid').value;
        var a22=document.getElementById('a2');
        if(pida==""){
            a22.innerHTML='不能为空';
            return false;
        }else {
          a22.innerHTML='√';
          return true;
        }
      }
      function xxoo()
      {
        var aa=nid();
        var bb=pid();
        return aa&&bb;
      }
  </script>
</table>

</form>
</div>
</body>
</html>

