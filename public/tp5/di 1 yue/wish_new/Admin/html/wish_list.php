<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link rel="stylesheet" type="text/css" href="../css/public.css">
</head>
			<!-- 许愿墙列表 -->
<body>
<?php 
header("content-type:text/html;charset=utf-8");
$link=mysqli_connect('127.0.0.1','root','root','wish_new');
$sql="select * from wisha";
$res=mysqli_query($link,$sql);
$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
//var_dump($arr);

?>

<meta charset='utf8'/>
<div  id="main">
    <table width="90%" border="0" cellspacing="0" cellpadding="0" class="news_table">
        <caption>
            许愿墙列表
        </caption>
        <tr>
            <th scope="col">许愿id</th>
            <th scope="col" width="100">昵称</th>
            <th scope="col">愿望内容</th>
            <th scope="col">许愿时间</th>
            <th scope="col">操作</th>
        </tr>
<?php foreach($arr as $w=>$e){ ?>
        <tr>
            <td><?php echo $e['id'];?></td>
            <td><?php echo $e['nname'];?></td>
            <td><?php echo $e['ncontent'];?></td>
            <td><?php echo $e['time'];?></td>
            <td>
				<a	href="wish_del.php?id=<?php echo $e['id'];?>">删除</a>
			</td>
        </tr>

      <?php }?>  

    </table>
</div>
</body>
</html>
