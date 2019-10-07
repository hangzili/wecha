<?php 
       include_once('user_a.php');
       //$a=new mysq;
       $p=empty($_GET['p'])?"1":$_GET['p'];
      $page_num=5;
      $first=($p-1)*$page_num;
      mysq::$ku='ada';

       $a=mysq::xxoo('admina');
       $sql=$a->adda('c_id,c_name,c_tel,c_hobby','admina')->limit($first,$page_num);
       $arr=$a->query(1);
      
        ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>
<body>
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center" border="1">
      <tr>
        <th width="120">ID</th>
        <th>姓名</th>       
        <th>电话</th>
        <th>爱好</th>
        <th>操作</th>       
      </tr>      
  <?php foreach($arr as $v){ ?>
        <tr>
          <td><?php echo $v['c_id'] ?></td>
          <td><?php echo $v['c_name'] ?></td>
          <td><?php echo $v['c_tel'] ?></td>
          <td><?php echo $v['c_hobby'] ?></td>  
           <td>深圳市民治街道</td> 
          <td>
            <div class="button-group"> 
              <a class="button border-red" href="del.php?c_id=<?php echo $v['c_id'] ?>"><span class="icon-trash-o"></span> 删除
              </a> 
              <a class="button border-red" href="update.php?c_id=<?php echo $v['c_id'] ?>"><span class="icon-trash-o"></span> 修改
              </a> 
            </div>
          </td>
        </tr>
         <?php } ?>
         
      <tr>
        <td colspan="8"><div class="pagelist">
<?php 
  $count=$a->adda('count(*) nums','admina')->query(2);
  $total=ceil($count['nums']/$page_num);
  include_once('5_13_b.php');
  $pa=new Page;
  echo $pa->fixedPage($p,$total);

 ?>
        </div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">


// </script>
</body></html>