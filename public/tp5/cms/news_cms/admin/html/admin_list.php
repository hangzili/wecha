<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../css/public.css">
</head>

<body>
    <?php 
    $p=empty($_GET['p'])?"1":$_GET['p'];
    $page=($p-1) * 3;

    $link=mysqli_connect('127.0.0.1','root','','18099');
    $sql="select * from admin limit $page,3";
    $res=mysqli_query($link,$sql);
    //$array=array[];
    while($arr=mysqli_fetch_assoc($res)){
        $array[]=$arr;
    }

    $sql2="select count(*) as con from admin";
    $res2=mysqli_query($link,$sql2);
    $arr2=mysqli_fetch_assoc($res2);
    $asd=$arr2['con'];
    $title=ceil($asd/3);
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
       <th scope="col">爱好</th>
       <th scope="col">城市</th>
       <th scope="col">操作</th>
    </tr>
      <?php
        $brr=array("上网","体育","学习"); 
      foreach($array as $k=>$v){ 
            $crr=explode(',',$v['hobby']);
            $tt="";
            foreach($crr as $q){

             $tt.=$brr[$q];
            }
        ?>
     <tr>
      <td><?php echo $v['id']; ?></td>
      <td><?php echo $v['username']; ?></td>
      <td>
          <?php 
            if($v['sex']==0){
              echo '男';
            }else {
              echo '女';
            }
          ?>
        </td>
      <td><?php echo $tt; ?></td>
      <td>
        <?php 
        if($v['city']==0){
          echo '北京';
        }else if($v['city']==1){
          echo '上海';
        }else{
          echo '南京';
        }
         ?>
      </td>
      <td>
          <a href="admin_del.php?id=<?php echo $v['id'];?>">删除</a>
          <a href="admin_xiugai.php?id=<?php echo $v['id'];?>">修改</a>
      </td>
    </tr>
      <?php } ?>
     
  </table>

<?php for($i=1;$i<=$title;$i++){ ?>
  <a href="admin_list.php?p=<?php echo $i ?>"><?php echo "第".$i."页" ?></a>
<?php } ?>

</div>
</body>
</html>
