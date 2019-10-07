<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="4 26 1to_do.php" method="post" onsubmit="return cc()">
		名称：<input type="text" name="b_name" onblur="namea()"><span>*</span><br>
		作者：<input type="text" name="b_author" onblur="thor()"><span>*</span><br>
		选择分类：<select name="fen">
					<?php 
						$link=mysqli_connect('127.0.0.1','root','','xxoo');
						$sql="select * from cate";
						$res=mysqli_query($link,$sql);
						while($arr=mysqli_fetch_assoc($res)){

					 ?>
					<option value="<?php echo $arr['c_id'] ?>"><?php echo $arr['c_name'] ?></option>
					<?php } ?>
				  </select><br>
			<input type="submit" value="添加书籍">
	</form>
	<script type="text/javascript">
	var aa=false;
	function namea()
	{
		var names=document.getElementsByTagName('input')[0].value;
		var ida1=document.getElementsByTagName('span')[0];
		//console.log(names);
		if(names==""){
			ida1.innerHTML='不能为空';
			return false;
		}
		var x=new XMLHttpRequest();
		x.onreadystatechange=function()
		{
			if(x.readyState==4&&x.status==200)
			{
				if(x.responseText=='ok'){
					ida1.innerHTML='<b style="color:red">书名已存在</b>';
					aa=false;
				}else{
					ida1.innerHTML='√';
					aa= true;
				}
			}
		}
		x.open('get','4 261.php?pp='+names,true);
		x.send();
		return aa;
	 }
	 function thor()
	 {
	 	var thora=document.getElementsByTagName('input')[1].value;
	 	var ida2=document.getElementsByTagName('span')[1];
	 	if(thora==""){
	 		ida2.innerHTML='不能为空';
			return false;
	 	}
	 }
	 function cc(){
	 	var shu=namea();
	 	var tian=thor();
	 	return shu&&tian;
	 }

	 	</script>
</body>
</html>