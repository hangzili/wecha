<?php

namespace App\Http\Controllers\admina;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\OrderModel;
use App\index\Shop_goods;
use App\index\AddressModel;
class OrderController extends Controller
{
    public function orderlist(Request $request)
    {
    	$usersession=session()->get('usersession');
    	if(empty($usersession)){
    		return redirect('/');
    	}
    	$all = $request->except('_token');

    	$where=[];
    	if(!empty($all['num'])){
    		$where[]=['num','=',$all['num']];
    	}
    	if(!empty($all['price'])){
    		$where[]=['price','=',$all['price']];
    	}
    	$list=OrderModel::where($where)->paginate(2);
    	return view('/admina/order/orderlist',['list'=>$list]);
    }
    public function orderx(Request $request)
    {
    	$all=$request->all();
    	$res=OrderModel::where('id',$all['id'])->first();
    	$order=AddressModel::where('address_id',$res['address_id'])->first();
    	$goods=Shop_goods::where('goods_id',$res['goods_id'])->get();
    	dump($order);
    	dump($goods);
    	
    }
}
