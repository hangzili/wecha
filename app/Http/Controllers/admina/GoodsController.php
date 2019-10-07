<?php

namespace App\Http\Controllers\admina;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\index\Shop_goods;
use Illuminate\Support\Facades\Storage;
use App\admin\CateModel;
class GoodsController extends Controller
{
	//商品展示
    public function goods_list()
    {
        $list=Shop_goods::get();
    	return view('/admina/goods/goods_list',['list'=>$list]);
    }
    //商品添加
    public function goods_add()
    {
    	$list=CateModel::get();
        $list=getClasss($list);
    	return view('/admina/goods/goods_add',['list'=>$list]);
    }
    //商品添加执行
    public function goods_adddo(Request $request)
    {
    	

        $path=null;
        if($request->hasFile('goods_img') && $request->file('goods_img')->isValid()){
            $path = $request->file('goods_img')->store('public');
            // $path=Storage::putFile('goods_img',$request->file('goods_img'));
        }
        $data=request()->all();
            // dd($request->file('img'));
        $data = $request->except('_token');
        $data['goods_img'] = strstr($path,'/');

        // dd($data);
    	$res=Shop_goods::insert($data);
    	if($res){
    		return redirect("/goods_list");
    	}
    }
}
