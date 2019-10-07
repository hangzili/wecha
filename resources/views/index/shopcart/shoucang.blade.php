<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>我的收藏</title>
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
<!--顶部搜索-->
<header class="wy-header">
  <div class="wy-header-icon-back"><span></span></div>
  <div class="wy-header-title">我的收藏</div>
</header>
<!--主体-->
<div class="weui-content">
  <div class='proListWrap'>
    @foreach($list as $k=>$v)
    <div class="pro-items">
      <div class="weui-media-box weui-media-box_appmsg">
        <div class="weui-media-box__hd"><a href="/pro_info?goods_id={{ $v->goods_id }}""><img class="weui-media-box__thumb" src="{{ asset('storage/'.$v->goods_img) }}" alt=""></a></div>
        <div class="weui-media-box__bd">
          <h1 class="weui-media-box__desc"><a href="/pro_info?goods_id={{ $v->goods_id }}"" class="ord-pro-link">{{ $v->goods_name }}</a></h1>
          <div class="wy-pro-pri">¥<em class="num font-15">{{ $v->shop_price }}</em></div>
          <ul class="weui-media-box__info prolist-ul">
            <li class="weui-media-box__info__meta" id="del" goods_id="{{ $v->goods_id }}"><a href="javascript:;" class="wy-dele"></a></li>
          </ul>
        </div>
      </div>
    </div>
   @endforeach
  </div>
</div>



<script src="/tel/lib/jquery-2.1.4.js"></script> 
<script src="/tel/lib/fastclick.js"></script> 
<script>
  $(function() {
    FastClick.attach(document.body);
  });
  // $("#del").click(function(){
  $(document).on("click", "#del", function() {
    var goods_id=$(this).attr('goods_id');
    // alert(goods_id);
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
    });
    $.ajax({
            url:"/collecdel",
            method: "POST",
            data: {"goods_id": goods_id},
            dataType: 'json',                
            success: function (res) {
              // location.reload();
                // alert(res);
            }
        });
  })
</script> 
<script src="js/jquery-weui.js"></script>
</body>
</html>
