<?php

namespace App\Http\Controllers\index;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\index\CartModel;
use App\index\CollectModel;
use App\index\AddressModel;
use App\index\Shop_goods;
class ShopcartController extends Controller
{
	//商品添加进购物车
	public function cartadd(Request $request)
	{
		//商品id
		$goods_id=$request->all();
		//用户id 
		// dd($goods_id);
		$data= $goods_id['user_id'] = 1;
		$data =$goods_id['by_number'] = 1;
		$data = $goods_id;
		// dd($data);
		$res = CartModel::where('goods_id',$goods_id['goods_id'])->first();
		// dump($res['by_number']);
		if($res){

			$by_number = $res['by_number'] + 1;
			$res = CartModel::where('goods_id',$goods_id)->update(['by_number'=>$by_number]);
		}
		$res=CartModel::insert($data);
	}
    //购物车展示页面
    public function shopcart(Request $request)
    {
    	$list = CartModel::get();
    	$list = DB::table('shop_cart')
    			->join('shop_goods','shop_goods.goods_id','=','shop_cart.goods_id')
    			->select('shop_goods.*','shop_cart.*')
    			->get();
    	return view('/index/shopcart/shopcart',['list'=>$list]);
    }
    //结算页面2
    public function order_info2(Request $request)
    {
    	$all=$request->all();
    	//判断用户是否有收货地址，如果没有跳入收货地址添加页面
    	//收货地址
        $address=AddressModel::where('is_default','1')->get();
        //如果没有收货地址添加
        if(empty($address)){
            return redirect("/address_edit");
        }
        $goods=Shop_goods::where('goods_id',$all['goods_id'])->get();
    	return view('/index/shopcart/order_info2',['address'=>$address,'goods'=>$goods]);
    }
    //购物车页面的加减
    public function numadd(Request $request)
    {
    	$all=$request->all();
    	$goods_id=$all['goods_id'];
    	$by_number=$all['by_number'] + 1;
    	$user_id=1;
    	$where=[
    		['goods_id','=',$goods_id],
    		['user_id','=',$user_id]
    	];
    	$res=CartModel::where($where)->update(['by_number'=>$by_number]);
    	return $by_number;
    }
    //减
    public function numsub(Request $request)
    {
    	$all=$request->all();
    	$goods_id=$all['goods_id'];
    	$by_number=$all['by_number'] - 1;
    	$user_id=1;
    	$where=[
    		['goods_id','=',$goods_id],
    		['user_id','=',$user_id]
    	];
    	$res=CartModel::where($where)->update(['by_number'=>$by_number]);
    }
    //加入收藏
    public function collection(Request $request)
    {
    	$all=$request->all();
    	$all['user_id'] = 1;
    	$res=CollectModel::insert($all);
    }
    //收藏展示页面
    public function shoucang()
    {
    	// $list=CollectModel::get();
    	$list = DB::table('shop_collect')
    			->join('shop_goods','shop_goods.goods_id','=','shop_collect.goods_id')
    			->select('shop_goods.*','shop_collect.*')
    			->get();
    	return view('/index/shopcart/shoucang',['list'=>$list]);
    }
    //收藏删除
    public function collecdel(Request $request)
    {
    	$all=$request->all();
    	$goods_id=$all['goods_id'];
    	// dump($goods_id);
    	$res=CollectModel::where('goods_id',$goods_id)->delete();
    }
}
