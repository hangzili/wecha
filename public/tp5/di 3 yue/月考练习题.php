<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="4 22 1_do.php" method="post">
		<table>
			<tr>
				<td>姓名</td>
				<td><input type="text" name="s_name" id='nid' onblur='namess()'></td>
				<td><span id='nnid'>*</span></td>
			</tr>
			<tr>
				<td>性别</td>
				<td>
					<input type="radio" name="s_sex" value="0">女
					<input type="radio" name="s_sex" value="1">男
				</td>
			</tr>
			<tr>
				<td>爱好</td>
				<td>
					<input type="checkbox" name="s_hobby[]" value="0">读书
					<input type="checkbox" name="s_hobby[]" value="1">听音乐
					<input type="checkbox" name="s_hobby[]" value="2">打篮球
				</td>
			</tr>
			<tr>
				<td>选择班级</td>
				<td>
				<?php 
					$link=mysqli_connect('127.0.0.1','root','','xo');
					$sql="select * from class";
					$res=mysqli_query($link,$sql);
					$array=array();
					while($arr=mysqli_fetch_assoc($res)){
						$array[]=$arr;
					}

				 ?>

					<select>
					<?php foreach($array as $k=>$v){ ?>
						<option>
							<?php echo $v['c_name'] ?>
							
						</option>
					<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="添加"></td>
				<td></td>
			</tr>
			
					<!-- <input type="hidden" name="id" value="<?php echo $array['id'] ?>"> -->
		</table>
	</form>
	<script type="text/javascript">
	function namess()
		{
			var nid=document.getElementById('nid').value;
			var nnid=document.getElementById('nnid');
			if(nid==""){
				nnid.innerHTML='<h4 style="color:red">不能为空</h4>';
			}
		}
	</script>
</body>
</html>
