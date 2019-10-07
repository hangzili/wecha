<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>手机注册</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">
<link rel="stylesheet" href="tel/lib/weui.min.css">
<link rel="stylesheet" href="tel/css/jquery-weui.css">
<link rel="stylesheet" href="tel/css/style.css">
</head>
<body ontouchstart>
<!--主体-->
<header class="wy-header">
  <div class="wy-header-icon-back"><span></span></div>
  <div class="wy-header-title">手机注册</div>
</header>
<form action="/registdo" method="post">
  @csrf
<div class="weui-content">
  <div class="weui-cells weui-cells_form wy-address-edit">
    <div class="weui-cell weui-cell_vcode">
      <div class="weui-cell__hd"><label class="weui-label wy-lab">邮箱</label></div>
      <div class="weui-cell__bd"><input  name="email" class="weui-input" type="email" placeholder="请输入邮箱"></div>
      <div class="weui-cell__ft"><button class="weui-vcode-btn">获取验证码</button></div>
    </div>
    <div class="weui-cell weui-cell_vcode">
      <div class="weui-cell__hd"><label class="weui-label wy-lab">验证码</label></div>
      <div class="weui-cell__bd"><input class="weui-input" type="number" placeholder="请输入验证码"></div>
      <div class="weui-cell__ft"><img class="weui-vcode-img" ></div>
    </div>
    <div class="weui-cell">
      <div class="weui-cell__hd"><label class="weui-label wy-lab">设置密码</label></div>
      <div class="weui-cell__bd"><input name="pwd" class="weui-input" type="number" pattern="[0-9]*" placeholder="请输入新密码"></div>
    </div>
    <div class="weui-cell">
      <div class="weui-cell__hd"><label class="weui-label wy-lab">确认密码</label></div>
      <div class="weui-cell__bd"><input name="pwdb" class="weui-input" type="number" pattern="[0-9]*" placeholder="请再次输入新密码"></div>
    </div>
  </div>
  <label for="weuiAgree" class="weui-agree">
    <input id="weuiAgree" type="checkbox" class="weui-agree__checkbox" checked="checked">
    <span class="weui-agree__text">阅读并同意<a href="javascript:void(0);">《注册协议》</a></span>
  </label>
  <input type="submit" value="注册并登陆" class="weui-btn weui-btn_warn" />
  <div class="weui-cells__tips t-c font-12">登陆账号为您输入的手机号码</div>
  <div class="weui-cells__tips t-c pd-10"><a href="xieyi.html" class="weui-cell_link font-12">查看注册协议</a></div>
  
</div>
</form>
<script src="tel/lib/jquery-2.1.4.js"></script> 
<script src="tel/lib/fastclick.js"></script> 
<script type="text/javascript" src="tel/js/jquery.Spinner.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
    
  });
</script>

<script src="tel/js/jquery-weui.js"></script>
</body>
</html>
