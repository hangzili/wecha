<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\index\ClassifyModel;
use App\index\Shop_goods;
class ClassifyController extends Controller
{
    //分类
    public function classify(Request $request)
    {
    	$all=$request->all();
        // dump($all);
        // $where=[];
        //接受ajax传过来的分类id
        if(!empty($all['cat_id'])){
            $two = Shop_goods::get();
            $two = getClass($two,$all['cat_id']);
        }
    	
    	//递归
    	$two = ClassifyModel::where('parent_id','!=',0)->get()->toArray();
        $two = getClass($two);
        //获取第一层分类
        $one = ClassifyModel::where('parent_id',0)->get();
    	return view('/index/classify/classify',['list'=>$one,'two'=>$two]);
    }
}
