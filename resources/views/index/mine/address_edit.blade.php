<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>编辑地址</title>
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
  <form action="/address_adddo" method="post">
    @csrf
  <a href="javascript:history.go(-1)"><div class="wy-header-icon-back"><span></span></div></a>
  <div class="wy-header-title">编辑地址</div>
</header>
<div class="weui-content">
  <div class="weui-cells weui-cells_form wy-address-edit">
    <div class="weui-cell">
      <div class="weui-cell__hd"><label class="weui-label wy-lab">收货人</label></div>
      <div class="weui-cell__bd"><input class="weui-input" name="consignee" type="text" placeholder="陈大鹏"></div>
    </div>
    <div class="weui-cell">
      <div class="weui-cell__hd"><label class="weui-label wy-lab">手机号</label></div>
      <div class="weui-cell__bd"><input class="weui-input" name="tel" type="number" pattern="[0-9]*" placeholder="18951263540"></div>
    </div>
    <div class="weui-cell">
      <div class="weui-cell__hd"><label for="name" class="weui-label wy-lab">所在地区</label></div>
      <div class="weui-cell__bd"><input name="area" class="weui-input" id="address" type="text" value="河北省 邯郸市 鸡泽县" readonly="" data-code="420106" data-codes="420000,420100,420106"></div>
    </div>
    <div class="weui-cell">
      <div class="weui-cell__hd"><label class="weui-label wy-lab">详细地址</label></div>
      <div class="weui-cell__bd">
        <textarea class="weui-textarea" name="detailed" placeholder="鸡泽县 曹庄乡 "></textarea>
      </div>
    </div>
    <div class="weui-cell weui-cell_switch">
      <div class="weui-cell__bd">设为默认地址</div>
      <div class="weui-cell__ft"><input id="check"  name="is_default" class="weui-switch" type="checkbox"></div>
    </div>
  </div> 
  <div class="weui-btn-area">
    <!-- <a href="javascript:" id="showTooltips"> -->
      <input type="submit" class="weui-btn weui-btn_primary" value="保存此地址" /><!-- </a> -->
<!--     <a href="javascript:;" class="weui-btn weui-btn_warn">删除此地址</a>
 -->  </div>

</div>
</form>
<script src="tel/lib/jquery-2.1.4.js"></script> 
<script src="tel/lib/fastclick.js"></script> 
<script type="text/javascript" src="tel/js/jquery.Spinner.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
  $("#check").click(function(){
        var status=$(this).prop('checked');
        alert(status);
        if(status){
          $(this).prop('value','1');
        }else{
          $(this).prop('value','2');
        }
      })
</script>

<script src="tel/js/jquery-weui.js"></script>
<script src="tel/js/city-picker.js"></script>
<script>
      $("#address").cityPicker({
        title: "选择出发地",
        onChange: function (picker, values, displayValues) {
          console.log(values, displayValues);
        }
      });
    </script>
</body>
</html>
