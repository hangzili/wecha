<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\User_address;
use app\index\model\Address;
use app\index\model\Car;
use app\index\model\Order_info;
use app\index\model\Order_goods;
class Order extends Base
{
   public function confirmOrder()
   {
        $goods_id=input('post.goods_id');
        if(!$this->checkLogin()){
            echo json_encode(['code'=>'0001','msg'=>'未登陆']);die;
        }else{
            echo json_encode(['code'=>'0000','msg'=>'已经登陆']);die;
        }
   }
   public function index()
   {
        $goods_id=input('ids','');
        // dump($goods_id);
        if($goods_id==""){
            $this->redirect('Car/index');
        }
        $user_id=session('indexsession')['id'];
        $user_address=User_address::where('user_id',$user_id)->all();
        $goods_id=input('get.ids');
        // dump($goods_id);
        if(!count($user_address)){
            $url='/index/Order/address?ids='.$goods_id;
            // dump($url);
            $this->redirect($url);
        }
        foreach($user_address as $k=>$v){
            $user_address[$k]['country']=Address::getaddressname($v['country']);
            $user_address[$k]['province']=Address::getaddressname($v['province']);
            $user_address[$k]['city']=Address::getaddressname($v['city']);
            $user_address[$k]['district']=Address::getaddressname($v['district']);
        }
        $where=[
            ['user_id','=',$user_id],
            ['goods_id','in',$goods_id]
        ];
        //价格
        $money=Car::getMoney($goods_id,$user_id);
        // dump($money);
        $goods=Car::where($where)->select();
        $this->assign('goods',$goods);
        $this->assign('goods_id',$goods_id);
        $this->assign('user_address',$user_address);
        $this->assign('money',$money);
        
        return view();
   }
   
   //地址添加页面
   public function address()
   {
     $goods_id=input('ids','');
        // dump($goods_id);
     // if(!$goods_id){
     //     $this->redirect('Car/index');
     // }

     $list=Address::where(['parent_id'=>'0'])->select();
     $this->assign('list',$list);
     $this->assign('goods_id',$goods_id);
        return view();
   }
   //地址添加执行
   public function saveaddress()
   {
        $post=input('post.');
        // dump($post);
        $post['user_id']=session('indexsession')['id'];
        $res=User_address::create($post);
        if($res){
            $url='/Order/index?ids'.$post['goods_id'];
            $this->redirect("Order/index");
        }
        
   }
   public function order()
   {
        $post=input('post.');
        if($post){
          dump($post);
        }
        //启动事务
        \Db::startTrans();
        try {

        $post['order_sn']=$this->createOrdersn();
        dump($post);
        $address=User_address::get($post['address_id']);
        $shipping_data=['1'=>'申通快递','2'=>'城际快递','3'=>'邮局平邮'];
        $post['shipping_name']=$shipping_data[$post['shipping_id']];
        $pay_data=['1'=>'余额支付','2'=>'银行亏款','3'=>'货到付款','4'=>'支付宝'];
        $post['pay_name']=$pay_data[$post['pay_id']];
        $user_id=session('indexsession')['id'];
        $post['goods_amount']=Car::getMoney($post['goods_id'],$user_id);
        $post['add_time']=time();
        $data=array_merge($address->toArray(),$post);
        $res=Order_info::create($data);
        if($res){
            // echo $res['order_id'];
            $goods=explode(',',$post['goods_id']);
            foreach($goods as $v){
                $where=[
                    'user_id'=>$user_id,
                    'goods_id'=>$v
                ];
                $car=Car::where($where)->find();
                $car['order_id']=$res['order_id'];
                // dump($car);
                Order_goods::create($car->toArray());
                //
                Car::where($where)->delete();
            }
        }
            $message=0;
            // 提交事务
            \Db::commit();
        } catch (\Exception $e) {
            // 回滚事务
            $message=$e->getMessage();
            \Db::rollback();
        }
        if(!$message){
           $this->redirect("Order/successorder",['oid'=>$res['order_id']]); 
       }else{
           $this->redirect("Car/index",['oid'=>$res['order_id']]);  
       }


        
   }
   public function createOrdersn()
   {
        return date('YmdHis',rand(888,9999));
   }
   public function successorder()
   {
        $oid=input('oid');
        $data=Order_info::field('order_sn,pay_name,goods_amount,shipping_name')->where('order_id',$oid)->find();
        // dump($data);
        $this->assign('data',$data);
        $this->assign('oid',$oid);
        return view();
   }
   //支付宝
   public function alipay()
   {
      $order_id=input('oid');
      if(!$order_id){
        return;
      }
      $order=Order_info::field('order_sn,goods_amount')->where('order_id',$order_id)->find();

      

      // require_once $extend_path.'alipay/config.php';
     $config=config('alipay.');
      $extend_path=\Env::get('root_path').'extend/';
      require_once $extend_path.'alipay/pagepay/service/AlipayTradeService.php';
      require_once $extend_path.'alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';



      //商户订单号，商户网站订单系统中唯一订单号，必填
      $out_trade_no = trim($order['order_sn']);

      //订单名称，必填
      $subject = 'ABCDE';

      //付款金额，必填
      $total_amount = trim($order['goods_amount']);

      //商品描述，可空
      $body = "";

      //构造参数
      $payRequestBuilder = new \AlipayTradePagePayContentBuilder();
      $payRequestBuilder->setBody($body);
      $payRequestBuilder->setSubject($subject);
      $payRequestBuilder->setTotalAmount($total_amount);
      $payRequestBuilder->setOutTradeNo($out_trade_no);

      $aop = new \AlipayTradeService($config);

      /**
       * pagePay 电脑网站支付请求
       * @param $builder 业务参数，使用buildmodel中的对象生成。
       * @param $return_url 同步跳转地址，公网可以访问
       * @param $notify_url 异步通知地址，公网可以访问
       * @return $response 支付宝返回的信息
      */
      $response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);

      //输出表单 
      var_dump($response);
     }


     //同步支付宝页面跳转
     public function returnpay()
     {
        /* *
       * 功能：支付宝页面跳转同步通知页面
       */
      $config=config('alipay.');
      $extend_path=\Env::get('root_path').'extend/';
      require_once $extend_path.'alipay/pagepay/service/AlipayTradeService.php';


      $arr=$_GET;
      $alipaySevice = new \AlipayTradeService($config); 
      $result = $alipaySevice->check($arr);

      /* 实际验证过程建议商户添加以下校验。
      1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
      2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
      3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
      4、验证app_id是否为该商户本身。
      */
      if($result) {//验证成功
        //请在这里加上商户的业务逻辑程序代码
        //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
          //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

        //商户订单号
        $out_trade_no = htmlspecialchars($_GET['out_trade_no']);
        //订单金额
        $total_amount = htmlspecialchars($_GET['total_amount']);
        //商户id
        $seller_id=htmlspecialchars($_GET['seller_id']);
        $app_id=htmlspecialchars($_GET['app_id']);

        //支付宝交易号
        $trade_no = htmlspecialchars($_GET['trade_no']);
        // 1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        //2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额）
        $where=[
            'order_sn'=>$out_trade_no,
            'goods_amount'=>$total_amount,
        ];
        $count=order_info::where($where)->count();
        if(!$count){
          $msg="支付宝交易号;".$count_no."商户订单号;".$out_trade_no."金额".$total_amount."与本站不符。请联系管理员";
          $this->error($msg,'Order/myorder');
        }
        //验证第三部
        if($seller_id!=config('alioay.seller_id')){
          $msg="支付宝交易号;".$trade_no."商户id;".$seller_id."与本站不符。请联系管理员";
          $this->error($msg,'Order/myorder');
        }
         //验证第四部
        if($app_id!=config('alioay.app_id')){
          $msg="支付宝交易号;".$trade_no."商户id;".$seller_id."与本站不符。请联系管理员";
          $this->error($msg,'Order/myorder');
        }
        // echo "验证成功<br />支付宝交易号：".$trade_no;
        $this->error($msg);

        //——请根据您的业务逻辑来编写程序（以上代码仅作参考
      }else{
          //验证失败
          echo "验证失败";
      }
    }
    public function myorder()
    {
        return view();
    }
    //支付异步
    public function notifypay()
    {
        $config=config('alipay.');
        $extend_path=\Env::get('root_path').'extend/';
        require_once $extend_path.'alipay/pagepay/service/AlipayTradeService.php';

        $arr=$_POST;
        $alipaySevice = new \AlipayTradeService($config); 
        $alipaySevice->writeLog(var_export($_POST,true));
        // $result = $alipaySevice->check($arr);
        $result=ture;
        // \Log::write('异步通知','notice');
        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），

        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */
        
        if($result) {//验证成功
             //商户订单号
          $out_trade_no = $_POST['out_trade_no'];
          //订单金额
          $total_amount = $_POST['total_amount'];
          //商户id
          $seller_id=htmlspecialchars($_POST['seller_id']);
          $app_id=htmlspecialchars($_POST['app_id']);
          $where=[
                'order_sn'=>$out_trade_no,
                'goods_amount'=>$total_amount,
          ];
              //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
            
            //商户订单号

            $out_trade_no = $_POST['out_trade_no'];

            //支付宝交易号

            $trade_no = $_POST['trade_no'];

            //交易状态
            $trade_status = $_POST['trade_status'];

             $count=order_info::where($where)->count();
            if(!$count){
              $msg="支付宝交易号;".$count_no."商户订单号;".$out_trade_no."金额".$total_amount."与本站不符。请联系管理员";
              \Log::write($msg,'notice');
              
            }
            //验证第三部 seller_id
            if($seller_id!=config('alioay.seller_id')){
              $msg="支付宝交易号;".$trade_no."商户id;".$seller_id."与本站不符。请联系管理员";
             \Log::write($msg,'notice');
            }
           //验证第四部
          if($app_id!=config('alioay.app_id')){
            $msg="支付宝交易号;".$trade_no."商户id;".$seller_id."与本站不符。请联系管理员";
            \Log::write($msg,'notice');
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
