<?php
	header("content-type:text/html;charset=utf-8");
	echo "
	<form><table>
		<tr>
			<td>*电子邮件</td>
			<td><input type=email></td>
		</tr>
		<tr>
			<td>*用户名</td>
			<td><input type=text></td>
		</tr>
		<tr>
			<td>*密码</td>
			<td><input type=password></td>
		</tr>
		<tr>
			<td>*确认密码</td>
			<td><input type=password></td>
		</tr>
		<tr>
			<td>手机号码</td>
			<td><input type=tel></td>
		</tr>
		<tr>
			<td>*用户类型</td>
			<td><input type=checkbox checked>社会人士<input type=checkbox>在校学生/应届毕业生</td>
		</tr>
		<tr>
			<td>推荐人编号</td>
			<td><input type=text>你可以成为“推荐人”拿奖品</td>
		</tr>
		<tr>
			<td>验证码</td>
			<td><input type=text></td>
		</tr>
		<tr>
			<td></td>
			<td><input type=radio>我已同意并阅读《卓博人才网个人用户服务协议》</td>
		</tr>
		<tr>
			<td></td>
			<td><input type=radio>我已阅读并同意《卓博人才网隐私保护政策》</td>
		</tr>
		<tr>
			<td></td>
			<td><input type=radio>订阅《财经周刊》</td>
		</tr>
		<tr>
			<td></td>
			<td><input type=submit value=注册></td>
		</tr>

	</table></form>
	"
?>