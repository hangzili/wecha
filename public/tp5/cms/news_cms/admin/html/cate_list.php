<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../css/public.css">
</head>

<body><?php date_default_timezone_set("PRC"); ?>
<div  id="main">
<table width="80%"  border="0" cellspacing="0" cellpadding="0" class="news_table">
        <?php 
            $p=empty($_GET['p'])?1:$_GET['p'];
            $app=empty($_GET['searce'])?"":$_GET['searce'];
            //$link=mysqli_connect('127.0.0.1','root','','18099');
            
            $page=($p-1) * 3;
            //echo $p;
            //循环
            $link=mysqli_connect('127.0.0.1','root','','18099');
            $sql="select * from category where c_name like '%$app%' limit $page,3";
            $arr=mysqli_query($link,$sql);
            $array=array();
            while($a=mysqli_fetch_assoc($arr)){
              $array[]=$a;
            }
            //分页获取条数
            $sql2="select count(*) as con from category where c_name like '%$app%'";
            $res2=mysqli_query($link,$sql2);
            $arr2=mysqli_fetch_assoc($res2);
            $count=$arr2['con'];
            $total=ceil($count/3);
           ?>
        <form action="cate_list.php" method="get">
            <input type="text" name="searce" />
            <input type="submit" value="搜索" />
        </form>
        <caption>
          新闻分类列表
        </caption>
        <tr>
          <th scope="col">编号</th>
          <th scope="col" width="100">分类名称</th>
          <th scope="col">添加人</th>
          <th scope="col">时间</th>
          <th scope="col">操作</th>
        </tr>
           <?php 
           foreach($array as $k=>$v){
            ?>
        <tr>
          <td><?= $v['c_id'] ?></td>
          <td><?= $v['c_name'] ?></td>
          <td><?= $v['c_man'] ?></td>
          <td><?= date("Y-m-d H:i:s",$v['c_time']) ?></td>
          <td>
            <a href="cate_del.php?c_id=<?= $v['c_id'] ?>">删除</a> 
            <a href="cate_xiugai.php?c_id=<?= $v['c_id'] ?>">修改</a></td>
        </tr>
        <?php } ?>
</table>
    <?php for($i=1;$i<=$total;$i++){ ?>
      <a href="cate_list.php?p=<?php echo $i ?>&searce=<?php echo $app ?>"><?php echo "第".$i."页" ?></a>
    <?php } ?>

</div>
</body>
</html>








