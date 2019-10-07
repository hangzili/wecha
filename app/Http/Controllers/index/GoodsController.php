<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\index\Shop_goods;
class GoodsController extends Controller
{
    //商品详情页
    public function pro_info(Request $request)
    {
    	$goods_id=$request->all();
    	$list=Shop_goods::where('goods_id',$goods_id)->get();
        // dd($list[0]['goods_id']);
    	return view('/index/goods/pro_info',['list'=>$list]);
    }
    //商品展示页
    public function pro_list(Request $request)
    {
        //是否精品
        $all=$request->all();
        $where=[];
        if(!empty($all['is_best'])){
            $where[]=['is_best','=',1];
        }
        if(!empty($all['cat_id'])){
            $where[]=['cat_id','=',3];
        }
        $list=Shop_goods::where($where)->get();
    	return view('/index/goods/pro_list',['list'=>$list]);
    }
}
