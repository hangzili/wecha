<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../css/public.css">
</head>

<body>
<meta charset='utf8'/>
<div  id="main">
<form action="news_list.php" method="get">
  <input type="text" name="sou" />
  <input type="submit" value="搜索" />
</form>
<table width="90%" border="0" cellspacing="0" cellpadding="0" class="news_table">
  <caption>
    新闻列表
  </caption>
<?php 
  $sou=empty($_GET['sou'])?"":$_GET['sou'];

  $p=empty($_GET['p'])?"1":$_GET['p'];
  //echo $p;
  $page=($p-1) * 3;

  date_default_timezone_set('PRC');
 $link=mysqli_connect('127.0.0.1','root','','18099');
 $sql="select * from category join news on category.c_id=news.c_id where n_title like '%$sou%' limit $page,3";
 $res=mysqli_query($link,$sql);
 while($arr=mysqli_fetch_assoc($res)){
      $array[]=$arr;
 }


 $sql2="select count(*) as con from news where n_title like '%$sou%'";
 $res2=mysqli_query($link,$sql2);
 $arr2=mysqli_fetch_assoc($res2);
 $asd=$arr2['con'];
 $tital=ceil($asd/3);


 ?>

  <tr>
    <th scope="col">编号</th>
    <th scope="col" width="100">新闻标题</th>
    <th scope="col">所属分类</th>
    <th scope="col" width="200">新闻内容</th>
    <th scope="col">添加人</th>
    <th scope="col">时间</th>
    <th scope="col">操作</th>
  </tr>
<?php foreach($array as $k=>$v){ ?>
  <tr>
		<td><?php echo $v['n_id'] ?></td>
		<td><?php echo $v['n_title'] ?></td>
		<td><?php echo $v['c_name'] ?></td>
		<td><?php echo $v['n_content'] ?></td>
		<td><?php echo $v['n_man'] ?></td>
		<td><?php echo date("Y-m-d H:i:s",$v['n_time']) ?></td>
		<td>
      <a id="aa<?php echo $v['n_id'] ?>" onclick="del(<?php echo $v['n_id'] ?>)">删除</a>||
      <a href="news_update.php?n_id=<?php echo $v['n_id'] ?>">修改</a>
    </td>
  </tr>
  <?php } ?>
 
</table>
<?php 
        for($i=1;$i<=$tital;$i++){
 ?>
  <a href="news_list.php?p=<?php echo $i ?>&sou=<?php echo $sou ?>"><?php echo "第".$i."页" ?></a>

 <?php } ?>
</div>
<script type="text/javascript">
  function del(bb)
  {
    var cc=document.getElementById('aa'+bb);
    var x=new XMLHttpRequest();
    x.onreadystatechange=function()
    {
        if(x.readyState==4 && x.status==200){
          var dd=cc.parentNode.parentNode;
          dd.style.display='none';
        }
    }
    x.open('get','news_delete.php?n_id='+bb,true);
    x.send();
  }
</script>
  
</body>
</html>

