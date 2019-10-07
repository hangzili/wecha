<?php
	header("content-type:text/html;charset=utf-8");
	
	echo "<form><table>
		<tr>
			<td>用户名：*</td>
			<td><input type=textt><input type=button value=检测></td>
		</tr>
		<tr>
			<td>密码</td>
			<td><input type=password></td>
		</tr>
		<tr>
			<td>再次输入密码</td>
			<td><input type=password></td>
		</tr>
		<tr>
			<td>密码保护问题</td>
			<td><select><option>请选择密码保护问题</option></select></td>
		</tr>
		<tr>
			<td>密码保护问题答案</td>
			<td><input type=text></td>
		</tr>
		<tr>
			<td>性别</td>
			<td><input type=radio>男<input type=radio>女</td>
		</tr>
		<tr>
			<td>出生日期</td>
			<td><input type=date></td>
		</tr>
		<tr>
			<td>手机号</td>
			<td><input type=number></td>
		</tr>
		<tr>
			<td></td>
			<td>看不清，换一张</td>
		</tr>
		<tr>
			<td>请输入上边字符</td>
			<td><input type=text></td>
		</tr>
		<tr>
			<td coldpsn=2><input type=radio>我已阅读并接受“服务条款”</td>
			
		</tr>
		<tr>
			<td><input type=submit></td>
			<td></td>
		</tr>

	</table></form>"

?>