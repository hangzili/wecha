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
<span class="action-span"><a href="attribute.php?act=add">添加属性</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品属性 </span>
<div style="clear:both"></div>
</h1>

<div class="form-div">
  <form action="/orderlist" method="post">
    @csrf
     订单号：<input type="text" name="num" size="15">
     价格：<input type="text" name="price" size="15">
    <input type="submit" value=" 搜索 " class="button">
  </form>
</div>

<form method="post" action="attribute.php?act=batch" name="listForm">
<div class="list-div" id="listDiv">

  <table cellpadding="3" cellspacing="1">
    <tbody>
		<tr>
			<th><input type="checkbox" class="allbox">编号 </th>
      <th>订单号</th>
			<th>价格</th>
			<th>操作</th>
		</tr>
      @foreach($list as $k=>$v)
        <tr>
			<td nowrap="true" valign="top"><span><input value="1" class="box" name="checkboxes[]" type="checkbox">{{ $v->id }}</span></td>
			<td class="first-cell" nowrap="true" valign="top"><span onclick="listTable.edit(this, 'edit_attr_name', 1)">{{ $v->num }}</span></td>
			<td nowrap="true" valign="top"><span>{{ $v->price }}</span></td>
			<td align="center" nowrap="true" valign="top">
				<a href="/orderx?id={{ $v->id }}" title="编辑">详情</a>
			</td>
		</tr>
    @endforeach

        
      </tbody></table>

  <table cellpadding="4" cellspacing="0">
    <tbody><tr>
      {{ $list->links() }}
    </tr>
  </tbody></table>
</div>

</form>

<div id="footer">
	版权所有 &copy; 2006-2013 软工教育 - 高级PHP - </div>
</div>

</body>
</html>

