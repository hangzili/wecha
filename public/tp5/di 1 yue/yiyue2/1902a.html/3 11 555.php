<?php
	header("content-type:text/html;charset=utf-8");
	echo "<h3>账户信息</h3>
		<form><table>
			<tr>
				<td>用户名</td>
				<td><input type=text></td>
			</tr>
			<tr>
				<td>设置密码</td>
				<td><input type=password></td>
			</tr>
			<tr>
				<td>确认密码</td>
				<td><input type=password></td>
			</tr>
			<h3>企业及联系人信息</h3>
			<tr>
				<td>公司名称</td>
				<td><input type=text placeholder=请填写单位名称></td>
			</tr>
			<tr>
				<td>公司地址</td>
				<td>
					<select><option>请选择</option></select>
					<select><option>请选择</option></select>
					<select><option>请选择</option></select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type=text placeholder=请填写街道地址></td>
			</tr>
			<tr>
				<td>公司邮箱</td>
				<td><input type=email></td>
			</tr>
			<tr>
				<td>固定电话</td>
				<td><input type=texe><input type=texe><input type=texe></td>
			</tr>
			<tr>
				<td>联系人姓名</td>
				<td><input type=text></td>
			</tr>
			<tr>
				<td>手机号</td>
				<td><input type=number></td>
			</tr>
			<tr>
				<td>验证码</td>
				<td><input type=text placeholder=请输入验证码></td>
			</tr>
			<tr>
				<td></td>
				<td><input type=checkbox>我已阅读并同意《当当交易条款》和《当当社区条款》</td>
			</tr>
			<tr>
				<td></td>
				<td><input type=submit value=立即注册></td>
			</tr>


			</table></form>
	"
?>