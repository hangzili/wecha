<?php
	header("content-type:text/html;charset=utf-8");
	echo  "
	<form><table>
		<tr>
			<td>昵称</td>
			<td><input type=text></td>
			<td>昵称不可以为空</td>
		</tr>
		<tr>
			<td>密码</td>
			<td><inout type=password></td>
			<td></td>
		</tr>
		<tr>
			<td>确认密码</td>
			<td><input type=password></td>
			<td></td>
		</tr>
		<tr>
			<td>性别</td>
			<td><input type=radio>男<input type=radio>女</td>
			<td></td>
		</tr>
		<tr>
			<td>生日</td>
			<td>
				<select><option>公里</option></select>
				<select><option>年</option></select>
				<select><option>月</option></select>
				<select><option>日</option></select>
			</td>
			<td></td>
		</tr>
		<tr>
			<td>所在地</td>
			<td>
			
				<select><option>中国</option></select>
				<select><option>北京</option></select>
				<select><option>东城</option></select>
			</td>
			<td></td>
		</tr>
		<tr>
			<td>验证码</td>
			<td></td>
			<td>点击换一张</td>
		</tr>
		<tr>
			<td></td>
			<td><input type=radio>同时开通QQ空间</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td><input type=radio>我已经阅读并同意相关服务条款</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td><input type=submit value=立即注册></td>
			<td></td>
		</tr>
	</table></form>"
?>