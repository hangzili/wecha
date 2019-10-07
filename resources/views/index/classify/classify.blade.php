<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商城分类</title>
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
<!--顶部搜索-->
<!--主体-->


<div class="wy-content">
  <div class="category-top">
    <header class='weui-header'>
  <div class="weui-search-bar" id="searchBar">
    <form class="weui-search-bar__form">
      <div class="weui-search-bar__box">
        <i class="weui-icon-search"></i>
        <input type="search" class="weui-search-bar__input" id="searchInput" placeholder="搜索您想要的商品" required>
        <a href="javascript:" class="weui-icon-clear" id="searchClear"></a>
      </div>
      <label class="weui-search-bar__label" id="searchText" style="transform-origin: 0px 0px 0px; opacity: 1; transform: scale(1, 1);">
        <i class="weui-icon-search"></i>
        <span>搜索您想要的商品</span>
      </label>
    </form>
    <a href="javascript:" class="weui-search-bar__cancel-btn" id="searchCancel">取消</a>
  </div>
</header>
  </div>
  <aside>
    <div class="menu-left scrollbar-none" id="sidebar">
      <ul>
        @foreach($list as $k=>$v)
        <li class="" cate_id="{{ $v->cate_id }}">{{ $v->cate_name }}</li>
        @endforeach
      </ul>
    </div>
  </aside>
  <section class="menu-right padding-all j-content">
    <h5>酒水食品</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
    <h5>酒水食品</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
  </section>
  <section class="menu-right padding-all j-content" style="display:none">
    @foreach($two as $k=>$v)
    <h5>{{ $v->cate_name }}</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
    @endforeach
  </section>
  <section class="menu-right padding-all j-content" style="display:none">
    <h5>家具家居</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
    <h5>家具家居</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
  </section>
  <section class="menu-right padding-all j-content" style="display:none">
    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
  </section>
  <section class="menu-right padding-all j-content" style="display:none">
    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
  </section>
  <section class="menu-right padding-all j-content" style="display:none">
    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>

    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
  </section>
  <section class="menu-right padding-all j-content" style="display:none">
    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
  </section>
  <section class="menu-right padding-all j-content" style="display:none">
    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
  </section>
  <section class="menu-right padding-all j-content" style="display:none">
    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
  </section>
  <section class="menu-right padding-all j-content" style="display:none">
    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
  </section>
  <section class="menu-right padding-all j-content" style="display:none">
    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
    <h5>服装服饰</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
  </section>
  <section class="menu-right padding-all j-content" style="display:none">
    <h5>旅游生活</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
    <h5>旅游生活</h5>
    <ul>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
      <li class="w-3"><a href="pro_list.html"></a> <img src="tel/upload/pro3.jpg"><span>酒水食品</span></li>
    </ul>
  </section>
</div>
<script src="tel/lib/jquery-2.1.4.js"></script> 
<script src="tel/lib/fastclick.js"></script> 
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
<script src="tel/js/jquery-weui.js"></script>
<script type="text/javascript">
	$(function($){
    // alert(2);
		$('#sidebar ul li').click(function(){
			$(this).addClass('active').siblings('li').removeClass('active');
      var cate_id=$(this).attr('cate_id');
      $.ajax({
            url:"/classify",
            method: "POST",
            data: {"cat_id": cate_id, _token:"{{csrf_token()}}"},
            dataType: 'json',                
            success: function (res) {
              // location.reload()
                alert(1);
            }
        });
			// var index = $(this).index();
			// $('.j-content').eq(index).show().siblings('.j-content').hide();
		})
	})
</script>
</body>
</html>
