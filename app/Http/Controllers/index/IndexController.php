<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\index\Shop_goods;
class IndexController extends Controller
{
	//开始页面
    public function index()
    { 
        //精品
        $boutique=Shop_goods::where('is_best',1)->paginate(3);
        //酒水推荐
        $grog=Shop_goods::where('cat_id',3)->paginate(6);
        //猜你喜欢
        $like=Shop_goods::paginate(6);
    	return view('/index/index/index',['boutique'=>$boutique,'grog'=>$grog,'like'=>$like]);
    }
    //商家入驻
    public function settled_in()
    {
    	return view('/index/index/settled_in');
    }
    //新闻详情
    public function news_info()
    {
        return view('/index/index/news_info');
    }

    
    
}
