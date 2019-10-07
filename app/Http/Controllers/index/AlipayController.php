<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;
class AlipayController extends Controller
{
    public function index()
    {
    	return view('/index/alipay/index');
    }
    public function apay(Request $request)
    {
    	$all=$request->all();
    	
    }
    //支付
    public function pay(Request $request)
    {
    	// dd($request->all());
    	$config = config('alipay');
    	 $order = [
    	 	//订单号
	            'out_trade_no' => $request->WIDout_trade_no,
	            //金额
	            'total_amount' => $request->WIDtotal_amount,
	            //标题
	            'subject' => $request->WIDsubject,
	            //描述
           	 ];

            $alipay = Pay::alipay($config)->web($order);

            return $alipay->send();// laravel 框架中请直接 `return $alipay`
    }
    public function return(Request $request)
    {
    	$config = config('alipay');
    	try{
    		$data =  Pay::alipay($config)->verify(); // 是的，验签就这么简单！
    	}catch(\Exception $e){
    		exit('验证服务器消息失败，支付失败！');
    	}
             $res = $this->query($data->out_trade_no);
             // dd($res);
             if($res->trade_status == "TRADE_SUCCESS"){
    		// 修噶数据表中的订单状态
    		// .....
    		return "支付成功，本次交易成功!";
    	}

    	return "本次交易失败，支付失败状态为:".$res->trade_status;
    }
    protected function query($orderid)
    {
    	$config = config('alipay');
    	$data = Pay::alipay($config)->find($orderid);
    	return $data;
    }
}
