<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 属性管理 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/admin/styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="/cate_add">添加分类</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品属性 </span>
<div style="clear:both"></div>
</h1>

<div class="form-div">
  <form action="" name="searchForm">
    <img src="/admin/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
    按商品类型显示：<select name="goods_type" onchange="searchAttr(this.value)"><option value="0">所有商品类型</option><option value="1" selected="true">书</option><option value="2">音乐</option><option value="3">电影</option><option value="4">手机</option><option value="5">笔记本电脑</option><option value="6">数码相机</option><option value="7">数码摄像机</option><option value="8">化妆品</option><option value="9">精品手机</option><option value="10">我的商品</option></select>
  </form>
</div>

<form method="post" action="attribute.php?act=batch" name="listForm">
<div class="list-div" id="listDiv">

  <table cellpadding="3" cellspacing="1">
    <tbody>
        <tr>
            <th><input onclick="listTable.selectAll(this, &quot;checkboxes[]&quot;)" type="checkbox">编号 </th>
            <th>分类名称</th>
            <th>商品类型</th>
            <th>操作</th>
        </tr>
        @foreach($list as $k=>$v)
        <tr>
            <td nowrap="true" valign="top"><span><input value="1" name="checkboxes[]" type="checkbox">{{ $v->cate_id }}</span></td>
            <td class="first-cell" nowrap="true" valign="top"><span onclick="listTable.edit(this, 'edit_attr_name', 1)">{{ $v->cate_name }}</span></td>
            <td nowrap="true" valign="top"><span>{{str_repeat("——",$v->num)}}{{$v->cate_name}}</span></td>
            <td align="center" nowrap="true" valign="top">
                <a href="?act=edit&amp;attr_id=1" title="编辑"><img src="/admin/images/icon_edit.gif" border="0" height="16" width="16"></a>
                <a href="javascript:;" onclick="removeRow(1)" title="移除"><img src="/admin/images/icon_drop.gif" border="0" height="16" width="16"></a>
            </td>
        </tr>
        @endforeach

       
</div>

</form>

<div id="footer">
    版权所有 &copy; 2006-2013 软工教育 - 高级PHP - </div>
</div>

</body>
</html>