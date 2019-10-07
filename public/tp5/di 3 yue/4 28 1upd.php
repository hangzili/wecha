<?php 
	$c_id=$_GET['c_id'];
	$link=mysqli_connect('127.0.0.1','root','','student');
	$sql="select * from class where c_id='$c_id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="4 28 1upd_do.php" method="post" onsubmit="return gaii()">
	<input type="hidden" name="c_id" value="<?php echo $arr['c_id'] ?>">
	<input type="hidden" name="old_name" value="<?php echo $arr['c_name'] ?>">
		姓名：<input type="text" name="c_name" value="<?php echo $arr['c_name'] ?>" onblur="na()"><span>*</span><br>
		性别：<input type="radio" name="c_sex" value="0" <?php if($arr['c_sex']=='0'){ echo "checked";} ?>>女
		      <input type="radio" name="c_sex" value="1" <?php if($arr['c_sex']=='1'){ echo "checked";} ?>>男<br>
		爱好：
			<?php $brr=explode(",",$arr['c_hobby']) ?>
			<input type="checkbox" name="c_hobby[]" value="0" <?php if(in_array(0,$brr)){ echo "checked";} ?>>唱歌
			<input type="checkbox" name="c_hobby[]" value="1" <?php if(in_array(1,$brr)){ echo "checked";} ?>>跳舞
			<input type="checkbox" name="c_hobby[]" value="2" <?php if(in_array(2,$brr)){ echo "checked";} ?>>游泳<br>
		城市：<select name="c_city">
			  <option value="0" <?php if($arr['c_city']==0){ echo "selected";} ?>>北京</option>
			  <option value="1" <?php if($arr['c_city']==1){ echo "selected";} ?>>上海</option>
			  <option value="2" <?php if($arr['c_city']==2){ echo "selected";} ?>>深圳</option>
			  </select><br>
		介绍：<textarea name="c_content"cols="30" rows="10"><?php echo $arr['c_content'] ?></textarea>
		<input type="submit" value="修改">
	</form>
	<script type="text/javascript">
	function na()
	{
		var isa=document.getElementsByTagName('input')[2].value;
		var sp=document.getElementsByTagName('span')[0];
		var xp=/^[a-z]\w{3,28}$/;
		if(isa==""){
			sp.innerHTML='不能为空';
			return false;
		}
		if(!xp.test(isa)){
			sp.innerHTML='格式不正确';
			return false;
		}else{
			sp.innerHTML='正确';
			return true;
		}
		
	}
	function gaii()
	{
		var aaa=na();
		return aaa;
	}
	
	</script>
</body>
</html>