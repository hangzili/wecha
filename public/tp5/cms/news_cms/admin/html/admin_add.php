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
<form name="login"  action="admin_add_do.php" method="post" onsubmit='return xxoo()'>
<table border="0"    cellspacing="20" cellpadding="0">
  <tr>
    <td>用户名：</td>
    <td><input   type="text" name="username" class="txt" onblur='uname()' id='unamid'/><span id="id1">*</span></td>
  </tr>
  <tr>
    <td>密码：</td>
    <td><input  type="password" name="psd"  class="txt" onblur='pwd()' id='pwdid'/><span id='id2'>*</span></td>
  </tr>
  <tr>
    <td>性别：</td>
    <td>
      <input   type="radio"  name="sex" value="0"/>男
      <input   type="radio"  name="sex" value="1"/>女
    </td>
  </tr>
    <tr>
    <td>爱好：</td>
    <td>
    <input   type="checkbox" name="nhobby[]" value="0"/>上网
    <input   type="checkbox" name="nhobby[]" value="1"/>体育
    <input   type="checkbox"  name="nhobby[]" value="2"/>学习
    </td>
  </tr>
      <tr>
    <td>城市：</td>
    <td>
    <select name="city"  class="s1">
    	<option value="0">北京</option>
        <option value="1">上海</option>
        <option value="2">南京</option>
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
<script type="text/javascript">
    function uname()
    {
      var unames=document.getElementsByTagName('input')[0].value;
      var id11=document.getElementsByTagName('span')[0];
      var aaa=/^[a-z]{4,29}$/;
      if(unames==""){
        id11.innerHTML='不能为空';
        return false;
      }else if(aaa.test(unames)){
        id11.innerHTML='ฅʕ•̫͡•ʔฅ';
        return true;
      }else {
        id11.innerHTML='格式错误';
        return false;
      }
    }
    function pwd()
    {
      var pwds=document.getElementsByTagName('input')[1].value;
      var id12=document.getElementsByTagName('span')[1];
      var bbb=/^[0-9]{3,12}$/;
      if(pwds==""){
        id12.innerHTML='不能为空';
        return false;
      }else if(bbb.test(pwds)){
        id12.innerHTML='ฅʕ•̫͡•ʔฅ';
        return true;
      }else {
        id12.innerHTML='格式错误';
        return false;
      }
    }
    function xxoo()
    {
      var q1=uname();
      var q2=pwd();
      return q1&&q2;
    }
   
</script>
</body>
</html>
