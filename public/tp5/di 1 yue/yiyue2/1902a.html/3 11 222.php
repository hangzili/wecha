<?php
	header("content-type:text/html;charset=utf-8");
	echo "
	<form><table>
	
		<tr>
			<td>用户名</td>
			<td><input type=text></td>
			<td>*只能用中文字，英文字母，数字和下划线</td>
		</tr>
		<tr>
			<td>真实名</td>
			<td><input type=text></td>
			<td></td>
		</tr>
		<tr>
			<td>密码：</td>
			<td><input type=password></td>
			<td>*必须填写</td>
		</tr>
		<tr>
			<td>确认：</td>
			<td><input type=password></td>
			<td>*必须填写</td>
		</tr>
		<tr>
			<td>邮箱：</td>
			<td><input type=eamil></td>
			<td></td>
		</tr>
		<tr>
			<td>电话：</td>
			<td><input type=tel></td>
			<td></td>
		</tr>
		<tr>
			<td>地址：</td>
			<td><input type=text></td>
			<td></td>
		</tr>
		<tr>
			<td>证件号：</td>
			<td><input type=number></td>
			<td>必须填写项</td>
		</tr>
		<tr>
			<td>学历：</td>
			<td><select><option>请选择</option></select>请选择学历</td>
			<td></td>
		</tr>
		<tr>
			<td colspan=2>性别：
			<input type=radio>男<input type=radio>女<input type=radio>保密</td>
			<td></td>
		</tr>
		<tr>
			<td colspan=2>
			<input type=radio>同意相关条约请先阅读注册条约</td>
			<td></td>
		</tr>
		<tr>
			<td colspan=2><input type=submit value=Register></td>
			
			<td></td>
		</tr>



		
	</table></form>"

?>