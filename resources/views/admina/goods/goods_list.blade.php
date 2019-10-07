<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link href="/admin/styles/general.css" rel="stylesheet" type="text/css" />
	<link href="/admin/styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
	<span class="action-span"><a href="/goods_add">添加新商品</a></span>
	<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品列表 </span>
	<div style="clear:both"></div>
</h1>

<div class="form-div">
  <form action="" name="searchForm">
    <img src="/admin/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
        <!-- 分类 -->
    <select name="cat_id">
		<option value="0">所有分类</option>
		<option value="1">手机类型</option>
		<option value="4">&nbsp;&nbsp;&nbsp;&nbsp;3G手机</option>
		<option value="5">&nbsp;&nbsp;&nbsp;&nbsp;双模手机</option>
		<option value="2">&nbsp;&nbsp;&nbsp;&nbsp;CDMA手机</option>
		<option value="3">&nbsp;&nbsp;&nbsp;&nbsp;GSM手机</option>
		<option value="12">充值卡</option>
		<option value="15">&nbsp;&nbsp;&nbsp;&nbsp;联通手机充值卡</option>
		<option value="13">&nbsp;&nbsp;&nbsp;&nbsp;小灵通/固话充值卡</option>
		<option value="14">&nbsp;&nbsp;&nbsp;&nbsp;移动手机充值卡</option>
		<option value="6">手机配件</option>
		<option value="11">&nbsp;&nbsp;&nbsp;&nbsp;读卡器和内存卡</option>
		<option value="7">&nbsp;&nbsp;&nbsp;&nbsp;充电器</option>
		<option value="8">&nbsp;&nbsp;&nbsp;&nbsp;耳机</option>
		<option value="9">&nbsp;&nbsp;&nbsp;&nbsp;电池</option>
	</select>
    <!-- 品牌 -->
    <select name="brand_id">
		<option value="0">所有品牌</option>
		<option value="1">诺基亚</option>
		<option value="10">金立</option>
		<option value="9">联想</option>
		<option value="8">LG</option>
		<option value="7">索爱</option>
		<option value="6">三星</option>
		<option value="5">夏新</option>
		<option value="4">飞利浦</option>
		<option value="3">多普达</option>
		<option value="2">摩托罗拉</option>
		<option value="11">  恒基伟业</option>
	</select>
    <!-- 推荐 -->
    <select name="intro_type">
		<option value="0">全部</option>
		<option value="is_best">精品</option>
		<option value="is_new">新品</option>
		<option value="is_hot">热销</option>
		<option value="is_promote">特价</option>
		<option value="all_type">全部推荐</option>
	</select>
         
     <!-- 供货商 -->
     <select name="suppliers_id">
		<option value="0">全部</option>
		<option value="1">北京供货商</option>
		<option value="2">上海供货商</option>
	</select>
    <!-- 上架 -->
     <select name="is_on_sale">
		<option value="">全部</option>
		<option value="1">上架</option>
		<option value="0">下架</option>
	</select>
	<!-- 关键字 -->
		关键字 <input type="text" name="keyword" size="15">
		<input type="submit" value=" 搜索 " class="button">
  </form>
</div>

<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
  <!-- start goods list -->
	<div class="list-div" id="listDiv">
		<table cellpadding="3" cellspacing="1">
			<tbody>
				<tr>
					<th><input type="checkbox">商品编号</th>
					<th>商品名称</th>
					<th>商品图片</th>
					<th>货号</th>
					<th>商品本价</th>
					<th>商品售价</th>
					<th>上架</th>
					<th>精品</th>
					<th>新品</th>
					<th>热销</th>
					<th>库存</th>
					<th>操作</th>
				</tr>
				<tr></tr>
				@foreach($list as $k=>$v)
				<tr>
					<td><input type="checkbox" name="checkboxes[]" value="32">{{ $v->goods_id }}</td>
					<td class="first-cell"><span>{{ $v->goods_name }}</span></td>
					<td class="first-cell"><span><img src="{{ asset('storage/'.$v->goods_img) }}" style="max-height: 50px"></span></td>
					<td><span>{{ $v->goods_sn }}</span></td>
					<td align="right"><span>{{ $v->goods_price }}</span></td>
					<td align="right"><span>{{ $v->shop_price }}</span></td>
					<!-- 是否上架 -->
					@if($v->is_up==1)
					<td align="center"><img src="/admin/images/yes.gif" onclick=""></td>
					@else
					<td align="center"><img src="/admin/images/no.gif" onclick=""></td>
					@endif
					<!-- 是否精品 -->
					@if($v->is_best==1)
					<td align="center"><img src="/admin/images/yes.gif" onclick=""></td>
					@else
					<td align="center"><img src="/admin/images/no.gif" onclick=""></td>
					@endif
					<!-- 是否新品 -->
					@if($v->is_new==1)
					<td align="center"><img src="/admin/images/yes.gif" onclick=""></td>
					@else
					<td align="center"><img src="/admin/images/no.gif" onclick=""></td>
					@endif
					<!-- 是否热销 -->
					@if($v->is_hot==1)
					<td align="center"><img src="/admin/images/yes.gif" onclick=""></td>
					@else
					<td align="center"><img src="/admin/images/no.gif" onclick=""></td>
					@endif
					<!-- 库存 -->
					<td align="right"><span onclick="">{{ $v->goods_num }}</span></td>
					<td align="center">
						<a href="../goods.php?id=32" target="_blank" title="查看"><img src="/admin/images/icon_view.gif" width="16" height="16" border="0"></a>
						<a href="goods.php?act=edit&amp;goods_id=32" title="编辑"><img src="/admin/images/icon_edit.gif" width="16" height="16" border="0"></a>
						<a href="goods.php?act=copy&amp;goods_id=32" title="复制"><img src="/admin/images/icon_copy.gif" width="16" height="16" border="0"></a>
						<a href="javascript:;" onclick="listTable.remove(32, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/images/icon_trash.gif" width="16" height="16" border="0"></a>
						<a href="goods.php?act=product_list&amp;goods_id=32" title="货品列表"><img src="/admin/images/icon_docs.gif" width="16" height="16" border="0"></a>          
					</td>
				</tr>
				@endforeach
	<!-- start 这段代码没有格式化，只是暂时显示数据用 开发的时候将会删除-->
   
   
  <!-- end 这段代码没有格式化，只是暂时显示数据用 开发的时候将会删除-->
  </tbody>
 </table>
<!-- end goods list -->

	<!-- 分页 -->
	<table id="page-table" cellspacing="0">
		<tbody>
			<tr>
				<td align="right" nowrap="true" style="background-color: rgb(255, 255, 255);">
					<!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
					<div id="turn-page">
						总计  <span id="totalRecords">22</span>个记录分为 <span id="totalPages">2</span>页当前第 <span id="pageCurrent">1</span>
						页，每页 <input type="text" size="3" id="pageSize" value="15" onkeypress="return listTable.changePageSize(event)">
						<span id="page-link">
							<a href="javascript:listTable.gotoPageFirst()">第一页</a>
							<a href="javascript:listTable.gotoPagePrev()">上一页</a>
							<a href="javascript:listTable.gotoPageNext()">下一页</a>
							<a href="javascript:listTable.gotoPageLast()">最末页</a>
							<select id="gotoPage" onchange="listTable.gotoPage(this.value)">
							<option value="1">1</option><option value="2">2</option>          </select>
						</span>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div>
	<input type="hidden" name="act" value="batch">
	<select name="type" id="selAction" onchange="changeAction()">
		<option value="">请选择...</option>
		<option value="trash">回收站</option>
		<option value="on_sale">上架</option>
		<option value="not_on_sale">下架</option>
		<option value="best">精品</option>
		<option value="not_best">取消精品</option>
		<option value="new">新品</option>
		<option value="not_new">取消新品</option>
		<option value="hot">热销</option>
		<option value="not_hot">取消热销</option>
		<option value="move_to">转移到分类</option>
		<option value="suppliers_move_to">转移到供货商</option>
	</select>

    <input type="hidden" name="extension_code" value="">
    <input type="submit" value=" 确定 " id="btnSubmit" name="btnSubmit" class="button" disabled="true">
</div>
</form>

<div id="footer">
	版权所有 &copy; 2006-2013 软工教育 - 高级PHP - 
</div>

</body>
</html>