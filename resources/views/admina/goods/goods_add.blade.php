<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link href="/admin/styles/general.css" rel="stylesheet" type="text/css" />
	<link href="/admin/styles/main.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/admin/js/utils.js"></script>
	<script type="text/javascript" src="/admin/js/selectzone.js"></script>
	<script type="text/javascript" src="/admin/js/colorselector.js"></script>
	<script type="text/javascript" src="/admin/js/calendar.php?lang="></script>
</head>
<body>
<h1>
	<span class="action-span"><a href="/goods_list">商品列表</a></span>
	<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心 </a> </span><span id="search_id" class="action-span1"> - 编辑商品信息 </span>
	<div style="clear:both"></div>
</h1>

<div class="tab-div">
    <!-- tab bar -->
    <div id="tabbar-div">
      <p>
        <span class="tab-front" id="general-tab">通用信息</span>
      </p>
    </div>

    <!-- tab body   enctype="multipart/form-data" -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="/goods_adddo" method="post" name="theForm"> 
      	@csrf
		 
		 <!-- 通用信息 -->
        <table width="90%" id="general-table" align="center" style="display: table;">
			<tbody>
				<tr>
					<td class="label">商品名称：</td>
					<td><input type="text" name="goods_name" value="诺基亚N85" size="30"><span class="require-field">*</span></td>
				</tr>
				<tr>
					<td class="label">商品货号： </td>
					<td><input type="text" name="goods_sn" value="ECS000032" size="20" onblur="checkGoodsSn(this.value,'32')"><span id="goods_sn_notice"></span><br>
					</td>
			</tr>
      <tr>
          <td class="label">商品库存： </td>
          <td><input type="text" name="goods_num" value="" size="20" onblur="checkGoodsSn(this.value,'32')"><span id="goods_sn_notice"></span><br>
          </td>
      </tr>
			<!-- 商品品牌 -->
			<tr>
				<td class="label">商品分类：</td>
				<td>
					<select name="brand_id" onchange="hideBrandDiv()">
						<option value="0">请选择...</option>
            @foreach($list as $k=>$v)
            <option value="{{ $v->cate_id }}">{{str_repeat("——",$v->num)}} {{$v->cate_name}}</option>
            @endforeach
					</select>
				</td>
			</tr>
            <tr>
				<td class="label">商品本价：</td>
				<td><input type="text" name="goods_price" value="3010.00" size="20" onblur="priceSetted()">
				<input type="button" value="按市场价计算" onclick="marketPriceSetted()">
				<span class="require-field">*</span></td>
			</tr>
			<tr>
            <td class="label">市场售价：</td>
            <td><input type="text" name="shop_price" value="3612.00" size="20">
              <input type="button" value="取整数" onclick="integral_market_price()">
            </td>
          </tr>
          <tr>
            <td class="label">是否精品：</td>
            <td>
              <select name="is_best" id="">
        				<option value="2">否</option>
        				<option value="1">是</option>
              </select>
            </td>
          </tr>
           <tr>
            <td class="label">是否新品：</td>
            <td>
              <select name="is_new" id="">
                <option value="2">否</option>
                <option value="1">是</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="label">是否热卖：</td>
            <td>
              <select name="is_hot" id="">
        				<option value="2">否</option>
        				<option value="1">是</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="label">是否上架：</td>
            <td>
              <select name="is_up" id="">
				<option value="2">否</option>
				<option value="1">是</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="label">上传商品图片：</td>
            <td>
              <input type="file" name="goods_img" size="35">
                              <a href="goods.php?act=show_image&amp;img_url=/admin/images/200905/goods_img/32_G_1242110760868.jpg" target="_blank"><img src="/admin/images/yes.gif" border="0"></a>
                            <br><input type="text" size="40" name="goods_img">
            </td>
          </tr>
        </tbody></table>

<!-- 商品描述 sku  相册   -->

        <div class="button-div">
                    <input type="submit" value=" 确定 " class="button">
          <input type="reset" value=" 重置 " class="button">
        </div>
        <input type="hidden" name="" value="update">
      </form>
    </div>
</div>

<!--  onclick="validate('32')" -->
<div id="footer">
	版权所有 &copy; 2006-2013 
</div>
<script type="text/javascript" src="/admin/js/tab.js"></script>
<script type="text/javascript">
	function addImg(obj){
      var src  = obj.parentNode.parentNode;
      var idx  = rowindex(src);
      var tbl  = document.getElementById('gallery-table');
      var row  = tbl.insertRow(idx + 1);
      var cell = row.insertCell(-1);
      cell.innerHTML = src.cells[0].innerHTML.replace(/(.*)(addImg)(.*)(\[)(\+)/i, "$1removeImg$3$4-");
  	}

    function removeImg(obj){
      var row = rowindex(obj.parentNode.parentNode);
      var tbl = document.getElementById('gallery-table');
      tbl.deleteRow(row);
  	}

   	function dropImg(imgId){
    	Ajax.call('goods.php?is_ajax=1&act=drop_image', "img_id="+imgId, dropImgResponse, "GET", "JSON");
  	}

  	function dropImgResponse(result){
      if (result.error == 0){
          document.getElementById('gallery_' + result.content).style.display = 'none';
      }
  	}

</script>
</body>
</html>