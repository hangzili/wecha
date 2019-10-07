
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../css/public.css">
</head>
				<!-- 管理员展示 -->
<body>
<?php
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','wish') or '错误';
	$sql="select * from admine_add where is_del=1 order by time desc";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
?>
<div  id="main">
<table  width="80%" border="0" cellspacing="0	" cellpadding="0" class="news_table">
  <caption>
    管理员列表
  </caption>
 
  <tr>
    <th scope="col">编号</th>
    <th scope="col" width="100">用户名</th>
    <th scope="col">性别</th>
    <th scope="col">自我介绍</th>
    <th scope="col">薪资</th>
    <th scope="col">城市</th>
    <th scope="col">时间</th>
    <th scope="col">操作</th>
  </tr>
<?php foreach($arr as $w=>$e){ ?>
  <tr>
    <td><?php echo $e['id'];?></td>
    <td><?php echo $e['username'];?></td>
    <td><?php echo $e['sex'];?></td>
    <td><?php echo $e['introduce'];?></td>
    <td><?php echo $e['money'];?></td>
    <td><?php echo $e['city'];?></td>
    <td><?php echo $e['time'];?></td>
    <td><a href="admin_del.php?id=<?php echo $e['id'];?>">删除</a>
		<a href="admin_d.php?id=<?php echo $e['id'];?>">修改</a>
		<a href="admin_del_do.php?id=<?php echo $e['id'];?>">放入回收站</a></td>
  </tr>
<?php } ?>
    
</table>



</div>
</body>
</html>
