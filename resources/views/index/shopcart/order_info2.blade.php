<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>订单详情</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">
<link rel="stylesheet" href="/tel/lib/weui.min.css">
<link rel="stylesheet" href="/tel/css/jquery-weui.css">
<link rel="stylesheet" href="/tel/css/style.css">
</head>
<body ontouchstart>
<!--主体-->
<header class="wy-header">
  <div class="wy-header-icon-back"><span></span></div>
  <div class="wy-header-title">订单详情</div>
</header>
<form action="/pay" methos="post">
  @csrf
<div class="weui-content">
  <div class="wy-media-box weui-media-box_text address-select">
    <div class="weui-media-box_appmsg">
      <div class="weui-media-box__hd proinfo-txt-l" style="width:20px;"><span class="promotion-label-tit"><img src="/tel/images/icon_nav_city.png" /></span></div>
      <div class="weui-media-box__bd">
        @foreach($address as $k=>$v)
        <input type="hidden" name="address" value="{{ $v->address_id }}" />
        <a href="address_list.html" class="weui-cell_access">
          <h4 class="address-name"><span>{{ $v->consignee }}</span><span>{{ $v->tel }}</span></h4>
          <div class="address-txt">{{ $v->area }}</div>
        </a>
        @endforeach
      </div>
      <div class="weui-media-box__hd proinfo-txt-l" style="width:16px;"><div class="weui-cell_access"><span class="weui-cell__ft"></span></div></div>
    </div>
  </div>
  <div class="wy-media-box weui-media-box_text">
    <div class="weui-media-box__bd">
     <div class="weui-media-box_appmsg ord-pro-list">
      @foreach($goods as $k=>$v)
      <input type="hidden" value="{{ $v->goods_id }}" name="goods_id" />
        <div class="weui-media-box__hd"><a href="pro_info.html"><img class="weui-media-box__thumb" src="{{ asset('storage/'.$v->goods_img) }}" alt=""></a></div>
        <div class="weui-media-box__bd">
          <h1 class="weui-media-box__desc"><a href="pro_info.html" class="ord-pro-link">{{ $v->goods_name }}</a></h1>
          <p class="weui-media-box__desc">规格：<span>红色</span>，<span>23</span></p>
          <div class="clear mg-t-10">
            <div class="wy-pro-pri fl">¥<em class="num font-15">{{ $v->shop_price }}</em></div>
            <div class="pro-amount fr"><span class="font-13">数量×<em class="name">1</em></span></div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="weui-panel">
    <div class="weui-panel__bd">
      <div class="weui-media-box weui-media-box_small-appmsg">
        <div class="weui-cells">
          <div class="weui-cell weui-cell_access">
            <!-- <div class="weui-cell__bd weui-cell_primary">
              <p class="font-14"><span class="mg-r-10">配送方式</span><span class="fr">快递</span></p>
            </div> -->
          </div>
          <!-- <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd weui-cell_primary">
              <p class="font-14"><span class="mg-r-10">运费</span><span class="fr txt-color-red">￥<em class="num">10.00</em></span></p>
            </div>
          </div>
          <a class="weui-cell weui-cell_access" href="money.html">
            <div class="weui-cell__bd weui-cell_primary">
              <p class="font-14"><span class="mg-r-10">可用蓝豆</span><span class="sitem-tip"><em class="num">1235</em>个</span></p>
            </div> -->
            <span class="weui-cell__ft"></span>
          </a>
          <a class="weui-cell weui-cell_access" href="coupon.html">
            <div class="weui-cell__bd weui-cell_primary">
              <p class="font-14"><span class="mg-r-10">优惠券</span><span class="sitem-tip"><em class="num">0</em>张可用</span></p>
            </div>
            <span class="weui-cell__ft"></span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="wy-media-box weui-media-box_text">
    <!-- <div class="mg10-0 t-c">总金额：<span class="wy-pro-pri mg-tb-5">¥<em class="num font-20"></em></span></div> -->

    <!-- <div class="mg10-0"><a href="/pay" class="weui-btn weui-btn_primary">支付宝付款</a></div> -->
    <div ><input type="submit" value="支付宝付款" class="weui-btn weui-btn_primary" /></div>
  </div>
</div>
</form>
<script src="/tel/lib/jquery-2.1.4.js"></script> 
<script src="/tel/lib/fastclick.js"></script> 
<script type="text/javascript" src="/tel/js/jquery.Spinner.js"></script>
<script>
  // $(function() {
  //   FastClick.attach(document.body);
  // });
</script>
<script type="text/javascript">
$(function(){
	$(".Spinner").Spinner({value:1, len:3, max:999});
});
</script>
<script src="/tel/js/jquery-weui.js"></script>


</body>
</html>
