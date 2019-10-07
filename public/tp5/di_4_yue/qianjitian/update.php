<?php 
	$c_id=$_GET['c_id'];
	include_once('user_a.php');
	$a=mysq::xxoo();
	$arr=$a->adda('c_name,c_tel,c_hobby,c_id','admina')->where('c_id','=',$c_id)->query(2);
	//var_dump($arr);



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
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 网站信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="update_do.php">
    <input type="hidden" name="c_id" value=<?php echo $arr['c_id'] ?>>
      <div class="form-group">
        <div class="label">
          <label>姓名：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="c_name" value="<?php echo $arr['c_name'] ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="c_tel" value="<?php echo $arr['c_tel'] ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>爱好：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="c_hobby" value="<?php echo $arr['c_hobby'] ?>" />
          <div class="tips"></div>
        </div>
      </div> 
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 修改</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body></html>