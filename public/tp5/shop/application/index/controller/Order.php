<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Address;
use app\index\model\Cart;
use app\index\model\OrderInfo;
class Order extends Common
{
   public function order()
   {
      $post=input('post.');
      // dump($post);exit;
      $address=Address::find($post['address_id'])->toArray();
      $pay_array=['1'=>'支付宝','2'=>'微信','3'=>'银行卡'];
      $post['pay_name']=$pay_array[$post['pay_id']];
      $post['order_sn']=$this->createordersn();
      $post['user_id']=session('userData.user_id');
      $post['add_time']=time();
      $user_id=session('userData.user_id');
      //商品总价
      $post['order_amount']=$post['goods_amount']=$post['order_amount'];
      // $post['order_amount']=$post['goods_amount']=model('Cart')->getTotal($post['goods_id'],$user_id);
      $order_info=array_merge($address,$post);
      // dump($post);
      $order_id=model('OrderInfo')->strict(false)->insertGetid($order_info);
      $order_goods=explode(',',$post['goods_id']);
      // $goods_id=$post['goods_id'];
      foreach($order_goods as $v){
          $data[]=[
            'user_id'=>$user_id,
            'goods_id'=>$v,
            'order_id'=>$order_id,
            'add_price'=>model('Goods')->getPrice($v),
            'by_number'=>model('Cart')->getByNumbe($v,$user_id)
          ];
        }
       $res=model('OrderGoods')->saveAll($data);
       if($res){
            model('Cart')->whereIn('goods_id',$post['goods_id'])->where('user_id',$user_id)->delete();
            $url=url('Order/payorder',['id'=>$order_id]);
            $this->redirect($url);
       }
   }
   public function createordersn()
   {
        return date('YmdHis').rand(1000,9999);
   }
   //支付第三个页面
   public function payorder()
   {
        $this->getCateInfo();//获取导航栏的数据
        $order_id=input('id');
        // echo $order_id;
        $order=model('OrderInfo')->where('order_id',$order_id)->all()->toArray();
        // dump($order);
        $this->assign('order',$order);
        return view();
   }
   //付费
   public function pay()
   {

      $oid=input('oid');
      //接收oid 获取信息
      if(!$oid){
        $this->error('发生未知错误');
      }
      $orderInfo=model('OrderInfo')->where('order_id',$oid)->find();
      //订单号
      $order_id=$orderInfo['order_id'];
      $order_goods_model=model('OrderGoods');
      $res=$order_goods_model->where('order_id',$order_id)->find();
      $by_number=$res['by_number'];
      $goods_id=$res['goods_id'];
      $goods_model=model('Goods');
      $asd=$goods_model->where('goods_id',$goods_id)->find();
      $num=$asd['goods_num'] - $by_number;
      $update=$goods_model->where('goods_id',$goods_id)->update(['goods_num' =>$num]);
      // dump($num);die;


      $config=config('alipay.');
      // require_once dirname(dirname(__FILE__)).'/config.php';
      require_once \Env::get('root_path').'extend/alipay/pagepay/service/AlipayTradeService.php';
      require_once \Env::get('root_path').'extend/alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';

      //商户订单号，商户网站订单系统中唯一订单号，必填
      $out_trade_no = $orderInfo['order_sn'];

      //订单名称，必填
      $subject = '快点结账';

      //付款金额，必填
      $total_amount = $orderInfo['order_amount'];

      //积分添加
      $integral_model=model('Integral');
      $user_id=session('userData.user_id');
      $res=$integral_model->where(['user_id'=>$user_id])->find();
      if($res){
        //有过更新
        $integral=$res['integral']+$total_amount;
        $asd=$integral_model->where('user_id',$user_id)->data(['integral' =>$integral])->update();
        // dump($asd);
      }else{
        //没有  添加
        $data=['user_id'=>$user_id,'integral'=>$total_amount];
        $asd=$integral_model->insert($data);
        // dump($asd);
      }

      //商品描述，可空
      $body = '';

      //构造参数
      $payRequestBuilder = new \AlipayTradePagePayContentBuilder();
      $payRequestBuilder->setBody($body);
      $payRequestBuilder->setSubject($subject);
      $payRequestBuilder->setTotalAmount($total_amount);
      $payRequestBuilder->setOutTradeNo($out_trade_no);

      $aop = new \AlipayTradeService($config);

      // *
      //  * pagePay 电脑网站支付请求
      //  * @param $builder 业务参数，使用buildmodel中的对象生成。
      //  * @param $return_url 同步跳转地址，公网可以访问
      //  * @param $notify_url 异步通知地址，公网可以访问
      //  * @return $response 支付宝返回的信息
      
      $response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);

      //输出表单
      var_dump($response);
    }
    public function returnpay()
    {
        // require_once("config.php");
        $config=config('alipay.');
        require_once \Env::get('root_path').'extend/alipay/pagepay/service/AlipayTradeService.php';

        $arr=$_GET;
        $alipaySevice = new \AlipayTradeService($config); 
        $result = $alipaySevice->check($arr);
        // dump($result);exit;
        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */
        if($result) {//验证成功
          /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
          //请在这里加上商户的业务逻辑程序代码
          //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表
          //商户订单号
          $out_trade_no = htmlspecialchars($_GET['out_trade_no']);
          //支付宝交易号
          $trade_no = htmlspecialchars($_GET['trade_no']);

          // 1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
          // 2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
          $user_id=session('userData.user_id');
          $where=[
            ['order_sn','=',$out_trade_no],
            ['order_amount','=',htmlspecialchars($_GET['total_amount'])]
          ];
          $order=model('OrderInfo')->where($where)->count();
          if(!$order){
            $message="订单".$out_trade_no."发生异常，请联系管理员";
            // $this->error($message,'/');
          }
          
          // 3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
          // 4、验证app_id是否为该商户本身。
          if(config('alipay.seller_id')!=htmlspecialchars($_GET['seller_id'])){
            $message="订单".$out_trade_no."发生异常，请联系管理员";
            // $this->error($message,'/');
          } 
          if(config('alipay.app_id')!=htmlspecialchars($_GET['app_id'])){
            $message="订单".$out_trade_no."发生异常，请联系管理员";
            // $this->error($message,'/');
          } 
          if(isset($message)){
            $this->error($message,'/');
          }else{
            $this->redirect('Order/myOrder');
          }
          // echo "验证成功<br />支付宝交易号：".$trade_no;

          //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
          
          /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
          
        }
        else {
            //验证失败
            echo "验证失败";
        }
     }
     //我的订单页面
     public function myOrder()
     {
        $user_id=session('userData.user_id');
        $order=model('OrderInfo')->where('user_id',$user_id)->order('add_time','desc')->select();
        $this->assign('order',$order);
        return view();
     }
     //支付宝异步通知页面
     public function notifypay()
     {
        $config=config('alipay.');
        require_once \Env::get('root_path').'extend/alipay/pagepay/service/AlipayTradeService.php';

        $arr=$_POST;
        $alipaySevice = new \AlipayTradeService($config); 
        $alipaySevice->writeLog(var_export($_POST,true));
        $result = $alipaySevice->check($arr);

        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */
       
        if($result) {//验证成功
          /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
          //请在这里加上商户的业务逻辑程序代

          
          //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
          
            //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
          
          //商户订单号

          $out_trade_no = $_POST['out_trade_no'];

          //支付宝交易号

          $trade_no = $_POST['trade_no'];

          //交易状态
          $trade_status = $_POST['trade_status'];

          $where=[
            ['order_sn','=',$out_trade_no],
            ['order_amount','=',htmlspecialchars($_POST['total_amount'])]
          ];
          $order=model('OrderInfo')->where($where)->count();
          if(!$order){
            $message="订单".$out_trade_no."发生异常，请联系管理员";
            // $this->error($message,'/');
          }
          
          // 3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
          // 4、验证app_id是否为该商户本身。
          if(config('alipay.seller_id')!=htmlspecialchars($_POST['seller_id'])){
            $message="订单".$out_trade_no."发生异常，请联系管理员";
            // $this->error($message,'/');
          } 
          if(config('alipay.app_id')!=htmlspecialchars($_POST['app_id'])){
            $message="订单".$out_trade_no."发生异常，请联系管理员";
            // $this->error($message,'/');
          } 
          if(isset($message)){
            $this->error($message,'/');
          }
            if($_POST['trade_status'] == 'TRADE_FINISHED') {

            //判断该笔订单是否在商户网站中已经做过处理
              //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
              //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
              //如果有做过处理，不执行商户的业务程序
                
            //注意：
            //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
            }
            else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
            //判断该笔订单是否在商户网站中已经做过处理
              //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
              //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
              //如果有做过处理，不执行商户的业务程序      
            //注意：
            //付款完成后，支付宝系统发送该交易状态通知
            }
          //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
          echo "success"; //请不要修改或删除
        }else {
            //验证失败
            echo "fail";

        }
     }
  }
