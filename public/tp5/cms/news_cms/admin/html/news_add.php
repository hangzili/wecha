<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../css/public.css">

    <script type="text/javascript" charset="utf-8" src="../../utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../../utf8-php/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="../../utf8-php/lang/zh-cn/zh-cn.js"></script>


</head>

<body>
<meta charset='utf8'/>
<div  id="main">
<h2>添加新闻</h2>
<form name="login"  action="insert.php" method="post" onsubmit='return xxoo()'>
<table border="0"    cellspacing="10" cellpadding="0">
  <tr>
    <td>新闻标题：</td>
    <td>
        <input   type="text" name="n_title" class="txt" onblur='texta()' id='textid'/>
        <span id="id1">*</span>
    </td>
  </tr>
  <?php 
    $link=mysqli_connect('127.0.0.1','root','','18099');
    $sql="select c_id,c_name from category";
    $res=mysqli_query($link,$sql);
    while($arr=mysqli_fetch_assoc($res)){
        $array[]=$arr;
    }
   ?>
  <tr>
    <td>新闻分类：</td>
    <td>
      <select class="s1" name='n_name'>
        <?php foreach($array as $k=>$v){ ?>
    		  <option value="<?php echo $v['c_id'] ?>"><?php echo $v['c_name'] ?></option>
        <?php } ?>
	    </select>
	</td>
  </tr>
  <tr>
    <td>新闻内容：</td>
    <td> <script id="editor" type="text/plain" style="width:1024px;height:500px;" name="n_content"></script></textarea></td>
    
  </tr>
  <tr>
    <td>添加人：</td>
    <td><input   type="text"  name="n_man"  class="txt"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <input  type="submit" value="添 加"  class="sub"/><input  type="reset" value="重 置"  class="res"/></td>
  </tr>
</table>
   
</form>
</div>

<script type="text/javascript">
    var ue = UE.getEditor('editor');
    function  texta() 
    {
      var testaa=document.getElementsByTagName('input')[0].value;
      var id1s=document.getElementsByTagName('span')[0];
      var aa=/^[a-z]\w{5,29}$/;
      if(testaa==""){
        id1s.innerHTML='不能为空';
        return false;
      }else if(aa.test(testaa)){
        id1s.innerHTML='√';
        return true;
      }else {
        id1s.innerHTML='格式错误';
        return false;
      }
    }
    function xxoo()
    {
      var aaa=texta();
      return aaa;
    }
</script>
</body>
</html>
