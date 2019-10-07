<?php
include 'phpEmailer/class.phpmailer.php';
//实例化邮件发送类
$mail = new PHPMailer();
// 使用SMTP方式发送
$mail->IsSMTP();
// 设置邮件的字符编码
$mail->CharSet='UTF-8';
// 企业邮局域名
$mail->Host = 'smtp.163.com';
//---------qq邮箱需要的------//设置使用ssl加密方式登录鉴权
//$mail->SMTPSecure = 'ssl';
//设置ssl连接smtp服务器的远程服务器端口号 可选465或587
$mail->Port = 25;//---------qq邮箱需要的------
// 启用SMTP验证功能
$mail->SMTPAuth = true;
//邮件发送人的用户名(请填写完整的email地址)
$mail->Username = 'hangzili@163.com' ;
// 邮件发送人的 密码 （授权码）
$mail->Password = 'hzl17695602784';  //修改为自己的授权码 
//邮件发送者email地址
$mail->From ='hangzili@163.com';
//发送邮件人的标题
$mail->FromName ='欢迎注册';
//收件人的邮箱 给谁发邮件
$email_addr = 'hangzili@163.com';
//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
$mail->AddAddress($email_addr);
//回复的地址
//$mail->AddReplyTo('1375767072@qq.com' , "" );
//$mail->AddAttachment("./mail.rar"); // 添加附件
// set email format to HTML //是否使用HTML格式
$mail->IsHTML(true);
//邮件标题
$mail->Subject = '1902a班级测试';
//邮件内
$mail->Body =  "欢迎注册，点击xxx前往激活";
//附加信息，可以省略$mail->AltBody = '';
// 添加附件,并指定名称//$mail->AddAttachment( './error404.php' ,'php文件');
//设置邮件中的图片//$mail->AddEmbeddedImage("shuai.jpg", "my-attach", "shuai.jpg");
if( !$mail->Send() ){    
	$mail_return_arr['mark'] = false ;    
	$str  =  "邮件发送失败. <p>";    
	$str .= "错误原因: " . $mail->ErrorInfo;    
	$mail_return_arr['info'] = $str ;
}else{    
	$mail_return_arr['mark'] = true ;    
	$str =  "邮件发送成功";    
	$mail_return_arr['info'] = $str ;
}
echo "<pre>";
print_r( $mail_return_arr); 
