<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../css/public.css">
</head>

<body>
<?php 
$link=mysqli_connect('127.0.0.1','root','root','18099');
$sql="select * from admin";
$res=mysqli_query($link,$sql);
//$array=array[];
while($arr=mysqli_fetch_assoc($res)){
    $array[]=$arr;
}



 ?>
 

<div  id="main">
<table  width="80%" border="0" cellspacing="0" cellpadding="0" class="news_table">
  <caption>
    管理员列表
  </caption>
  <tr>
    <th scope="col">编号</th>
    <th scope="col" width="100">名称</th>
    <th scope="col">性别</th>
    <th scope="col">密码</th>
    <th scope="col">爱好</th>
    <th scope="col">城市</th>
    <th scope="col">介绍</th>
    <th scope="col">操作</th>
  </tr>

  <?php foreach($array as $k=>$v){ ?>
  <tr>
    <td><?php echo $v['id']; ?></td>
    <td><?php echo $v['username']; ?></td>
    <td><?php echo $v['sex']; ?></td>
    <td><?php echo $v['pwd']; ?></td>
    <td><?php echo $v['hobby']; ?></td>
    <td><?php echo $v['city']; ?></td>
    <td><?php echo $v['city']; ?></td>
    <td>
      <a href="admin_del.php?id=<?php echo $v['id']; ?>">删除</a>
    </td>
  </tr>
<?php } ?>
 
</table>



</div>
</body>
</html>
