<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>地址管理</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">
<link rel="stylesheet" href="tel/lib//weui.min.css">
<link rel="stylesheet" href="tel/css/jquery-weui.css">
<link rel="stylesheet" href="tel/css/style.css">
</head>
<body ontouchstart>
<!--主体-->
<header class="wy-header">
  <a href="javascript:history.go(-1)"><div class="wy-header-icon-back"><span></span></div></a>
  <div class="wy-header-title">地址管理</div>
</header>
<div class="weui-content">
  <div class="weui-panel address-box">
    @foreach($list as $k=>$v)
    <div class="weui-panel__bd">
      <div class="weui-media-box weui-media-box_text address-list-box">
        <a href="/address_upda?list={{ $v->address_id }}" class="address-edit"></a>
        <h4 class="weui-media-box__title"><span>{{ $v->consignee }}</span><span>{{ $v->tel }}</span></h4>
        <p class="weui-media-box__desc address-txt">
          {{ $v->area }} {{ $v->detailed }}
        </p>
        @if($v->is_default==1)
        <span class="default-add">默认地址</span>
        @endif
      </div>
    </div>
   @endforeach
  </div>
  <div class="weui-btn-area">
    <a class="weui-btn weui-btn_primary" href="/address_edit" id="showTooltips">添加收货地址</a>
  </div>
</div>

<script src="tel/lib//jquery-2.1.4.js"></script> 
<script src="tel/lib//fastclick.js"></script> 
<script type="text/javascript" src="tel/js/jquery.Spinner.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
<script src="tel/js/jquery-weui.js"></script>
</body>
</html>
