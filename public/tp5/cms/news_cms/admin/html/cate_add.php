<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../css/public.css">
</head>

<body>
<div  id="main">
<h2>添加分类</h2>
<form name="login"  action="cate_add_do.php" method="post">
	<table border="0"    cellspacing="10" cellpadding="0">
		  <tr>
			<td>分类名称：</td>
			<td><input   type="text" name="c_name" class="txt" onblur='na()' id='nid'/>
				<span id='a1'>*</span>
			</td>
		  </tr>
			<tr>
			<td>添加人：</td>
			<td><input   type="text"  name="c_man"  class="txt" onblur='ta()' id='tid'/>
				<span id='a2'>*</span>
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
	function na()
	{
		var ida=document.getElementById('nid').value;
		var a11=document.getElementById('a1')
		//定义
		var x=new XMLHttpRequest();
		//事件
		x.onreadystatechange=function()
		{
			if(x.readyState==4 && x.status==200)
			{
				if(ida==""){
				a11.innerHTML='不能为空';
				}else if(x.responseText=='ok'){
					a11.innerHTML='用户名已存在';
				}else {
					a11.innerHTML='√';
				}
			}
		}
		x.open('get','2.php?pp='+ida,true);
		x.send();
	}
	function ta()
	{
		var tida=document.getElementById('tid').value;
		var a22=document.getElementById('a2');
		if(tida==""){
			a22.innerHTML='不能为空';
		}else{
			a22.innerHTML='√';
		}
	}
</script>
</body>
</html>
