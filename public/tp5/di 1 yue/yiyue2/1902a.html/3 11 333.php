<?php
	header("content-type:text/html;charset=utf-8");
	echo "
		<form>
		<table>
			<tr>
				<td>姓名：</td>
				<td><input type=text>**</td>
			</tr>
			<tr>
				<td>密码：</td>
				<td><input type=password>**</td>
			</tr>
			<tr>
				<td>确认密码：</td>
				<td><input type=password>**</td>
			</tr>
			<tr>
				<td>密码提示问题：</td>
				<td><select><option>请选择一个问题</option></select>**</td>
			</tr>
			<tr>
				<td>密码提示答案：</td>
				<td><input type=text>**</td>
			</tr>
			<tr>
				<td>性别：</td>
				<td><input type=radio>男<input type=radio>女**</td>
			</tr>
			<tr>
				<td>生日：</td>
				<td>
					<select><option>1908</option></select>年
					<select><option>1</option></select>月
					<select><option>1</option></select>日
				</td>
			</tr>
			<tr>
				<td>地区：</td>
				<td>
					<select><option>河北</option></select>省/直辖市
					<select><option>承德</option></select>市
				</td>
			</tr>
			<tr>
				<td>爱好：</td>
				<td><input type=checkbox>学习<input type=checkbox>体育<input type=checkbox>上网</td>
			</tr>

			
		</table></form>
	"
?>