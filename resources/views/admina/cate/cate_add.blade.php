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
<span class="action-span"><a href="/cate_list">分类展示</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 编辑分类 </span>
<div style="clear:both"></div>
</h1>

<div class="main-div">
  <form action="/cate_adddo" method="post" name="theForm" onsubmit="return validate();">
    @csrf
  <table width="100%" id="general-table">
      <tbody><tr>
        <td class="label">分类名称：</td>
        <td>
          <input type=i"text" name="cate_name" value="作者" size="30">
          <span class="require-field">*</span>        </td>
      </tr>
      <tr>
        <td class="label">上一级分类：</td>
        <td>
          <select name="parent_id" onchange="onChangeGoodsType(this.value)">
          <option value="0">请选择...</option>
          @foreach($list as $k=>$v)
          <option value="{{ $v->cate_id }}">{{str_repeat("——",$v->num)}} {{$v->cate_name}}</option>
          @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <div class="button-div">
          <input type="submit" value=" 确定 " class="button">
          <input type="reset" value=" 重置 " class="button">
        </div>
        </td>
      </tr>
      </tbody></table>
  </form>
</div>

<div id="footer">
	版权所有 &copy; 2006-2013 软工教育 - 高级PHP - </div>
</div>

</body>
</html>