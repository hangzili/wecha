<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Address;
use app\index\model\Area;
class Cart extends Common
{
    //加入购物车
   public function addCar()
   {
        $data=input('post.');
        $data['create_time']=time();
        if($this->checkLogin()){
            //登陆加入购物车存数据库
            $result=$this->addCartDb($data);
        }else{
            //没登陆加入购物车存cookie
            $result=$this->addCartCookie($data);
        }
       echo json_encode($result); 

   }
   //登陆加入购物车存数据库
   public function addCartDb($data)
   {
        $user_id=session('userData.user_id');
        $data['user_id']=$user_id;
        $cartWhere=[
            ['user_id','=',$user_id],
            ['goods_id','=',$data['goods_id']]
        ];
        // dump($cartWhere);
        
        $cart_model=model('Cart');
        $cartes=$cart_model->where($cartWhere)->find();
        if(!empty($cartes)){
            
            //如果数据库里面有修改一下购买数量
            // $data['by_number'] += $cartes['by_number'];
            $data['create_time']=time();
            //计算库存够不够
            $result=$this->checkByNumber($data['by_number'],$data['goods_id'],$cartes['by_number']);
            if(is_array($result)){
                return $result;
            }

              //加入购物车如果被删除就修改1 2 如果没删除就修改数量
            if($cartes['is_del']==1){

              $data['by_number'] += $cartes['by_number'];
              $res=$cart_model->where($cartWhere)->data(['by_number'=>$data['by_number'],'create_time'=>time()])->update();
            }else{
              $res=$cart_model->where($cartWhere)->update(['is_del'=>1]);
              $data['by_number'] += $cartes['by_number'];
              $res=$cart_model->where($cartWhere)->data(['by_number'=>$data['by_number'],'create_time'=>time()])->update();
            }
          if($res){
              return ['font'=>'','res'=>'1'];
          }else{
              return ['font'=>'加入购物车失败','res'=>'2'];
          }
            

            
            
        }else{
            //如果数据库里面没有添加
            $result=$this->checkByNumber($data['by_number'],$data['goods_id']);
            if(is_array($result)){
                return $result;
            }

            $res=$cart_model->save($data);
            if($res){
                return ['font'=>'','res'=>'1'];
            }else{
                return ['font'=>'加入购物车失败','res'=>'2'];
            }
        }
   }
   
   //没登陆加入购物车存cookie
   public function addCartCookie($data)
   {
        //cookie里面有值
        $cartInfo=cookie('cartInfo');
        //判断cookie是否为空
        if(!empty($cartInfo)){
            //如果cookie不为空，就添加购物车，添加前判断购物车里面是否有，如果有就修改 如果没有就添加到里面 ，是否超过库存
            $goods_id=$data['goods_id'];
            if(array_key_exists($data['goods_id'],$cartInfo)){
                //判断加起来库存够不够
                $result=$this->checkByNumber($data['by_number'],$data['goods_id'],$cartInfo[$data['goods_id']]['by_number']);
                if(is_array($result)){
                    return $result;
                }

                //购物车有就把购买数量加起来  更新一下
                $cartInfo[$data['goods_id']]['by_number']=$cartInfo[$data['goods_id']]['by_number']+$data['by_number'];
                $cartInfo[$data['goods_id']]['create_time']=time();
            }else{
                //判断加起来库存够不够
                $result=$this->checkByNumber($data['by_number'],$data['goods_id']);
                if(is_array($result)){
                    return $result;
                }
                //购物车没有就添加一条
                $cartInfo[$data['goods_id']]=$data;
            }
            cookie('cartInfo',$cartInfo);
        }else{
            $cartInfo[$data['goods_id']]=$data;
            cookie('cartInfo',$cartInfo);
        }
       return ['font'=>'','res'=>'1']; 
        
   }

   //购物车展示页面
   public function cartList()
   {
        $this->getCateInfo();//获取导航栏的数据
        if($this->checkLogin()){
            //登陆从数据库里面度数据
            $cartInfo=$this->getCateInfoDb();
        }else{
            //没登陆从cookie里面度数据
            $cartInfo=$this->getCateInfoCookie();
        }
        //获取计算总价
        if(!empty($cartInfo)){
            $total=0;
            foreach($cartInfo as $k=>$v){
                if($v['is_up']==1){
                    $total += $v['goods_price'] * $v['by_number'];
                }
            }
            $this->assign('total',$total);
        }


        $this->assign('cartInfo',$cartInfo);
        return $this->fetch();
   }
   //购物车展示页面  登陆从数据库里面度数据
   public function getCateInfoDb()
   {
        $user_id=session('userData.user_id');
        $where=[
            ['user_id','=',$user_id],
            ['is_del','=',1]
        ];
        $cart_model=model('Cart');
        $cartInfo=$cart_model
            ->field('c.add_price,by_number,c.goods_id,g.goods_name,goods_img,goods_price,goods_num,is_up')
            ->alias('c')
            ->join('shop_goods g','c.goods_id=g.goods_id')
            ->where($where)
            ->order('c.create_time','desc')
            ->select();
        $collect_model=model('Collect');
        $wheree=[
            ['user_id','=',$user_id],
            ['is_del','=',1]
        ];
        $collect_model_goodsid=$collect_model->where($wheree)->column('goods_id');
        foreach ($cartInfo as $k=>$v) {
          if(in_array($v['goods_id'],$collect_model_goodsid)){
            $cartInfo[$k]['flag']=1;
          }else{
            $cartInfo[$k]['flag']=2;
          }
        }
        if(!empty($cartInfo)){
            return $cartInfo;
        }else{
            return false;
        }
   }
   //购物车展示页面没登陆
   public function getCateInfoCookie()
   {
        
        $cartInfo=cookie('cartInfo');
       if(!empty($cartInfo)){
                //循环获取加入购物车的时间，商品id不变
            foreach ($cartInfo as $k=>$v) {
                $order[$k]=$v['create_time'];
            }
                //通过添加的时间进行倒叙
            array_multisort($order,SORT_DESC,$cartInfo);
                //从数组中取出一列商品id
            $goods_id=array_column($cartInfo,'goods_id');
            $goods_model=model('Goods');
            $where=[
                ['goods_id','in',$goods_id]
            ];
                //根据某个进行倒叙
            $goods_id=implode(',',$goods_id);
            $exp=new \think\db\Expression("field(goods_id,$goods_id)");
            $goodsInfo=$goods_model
                    ->field('goods_id,goods_name,goods_price,goods_num,goods_img,is_up')
                    ->where($where)
                    ->order($exp)
                    ->select()
                    ->toArray();
                //合并数组，将cokie中的数据和查询到的商品合并
            foreach ($goodsInfo as $k=>$v) {
                $goodsInfo[$k]=array_merge($v,$cartInfo[$k]);
            }

            $collect_model=model('Collect');
            $wheree=[
                ['is_del','=',1]
            ];
            $collect_model_goodsid=$collect_model->where($wheree)->column('goods_id');
            foreach ($goodsInfo as $k=>$v) {
              if(in_array($v['goods_id'],$collect_model_goodsid)){
                $goodsInfo[$k]['flag']=1;
              }else{
                $goodsInfo[$k]['flag']=2;
              }
            }

            return $goodsInfo;
       }else{
            return false;
       }

   }
   //购物车展示页面加减
   public function changeNumber()
   {
        $goods_id=input('post.goods_id');
        $by_number=input('post.by_number');
        if($this->checkLogin()){
            //登陆
            $res=$this->changeNumberDb($goods_id,$by_number);
        }else{
            //未登陆
            $res=$this->changeNumberCookie($goods_id,$by_number);
        }
        return json_encode($res);
   }
   //登录加减购物车页面
   public function changeNumberDb($goods_id,$by_number)
   {
        $user_id=session('userData.user_id');
        $where=[
            ['goods_id','=',$goods_id],
            ['user_id','=',$user_id],
            ['is_del','=',1]
        ];
        $cart_model=model('Cart');
        $res=$cart_model->where($where)->update(['by_number'=>$by_number]);
        if($res){
            return ['font'=>'','code'=>1];
        }else{
            return ['font'=>'操作失败','code'=>2];
        }

   }
   //不登陆加减购物车页面
   public function changeNumberCookie($goods_id,$by_number)
   {
      $cookie=cookie('cartInfo');
      $new=$cookie[$goods_id]['by_number']=$by_number;
      cookie('cartInfo',$cookie);
   }
   //计算小计
   public function getSubtotal()
   {
        $goods_id=input('post.goods_id');
        if($this->checkLogin()){
            //登陆
            return $res=$this->getSubtotalDb($goods_id);
        }else{
            //未登陆
            return $res=$this->getSubtotalCookie($goods_id);
        }
   }
   //登陆后算小计
   public function getSubtotalDb($goods_id)
   {
        $user_id=session('userData.user_id');
        $cart_model=model('Cart');
        $where=[
            ['goods_id','=',$goods_id],
            ['user_id','=',$user_id]
        ];
        $by_number=$cart_model->where($where)->value('by_number');
        $goodsWhere=[
            ['goods_id','=',$goods_id]
        ];
        $goods_model=model('Goods');
        $goods_price=$goods_model->where($goodsWhere)->value('goods_price');
        return $goods_price * $by_number;
   }
   //不登陆算小计
   public function getSubtotalCookie($goods_id)
   {
      $cookie=cookie('cartInfo');
      if(!empty($cookie)){
        $by_number=$cookie[$goods_id]['by_number'];
        $goods_model=model('Goods');
        $where=[
          ['goods_id','=',$goods_id],
          ['is_up','=',1]
        ];
        $goods_price=$goods_model->where($where)->value('goods_price');
        return $goods_price * $by_number;
      }

   }
   //计算总价
   public function getTotal()
   {
        $goods_id=input('post.goods_id');
        if($this->checkLogin()){
            //登陆
            $total=$this->getTotalDb($goods_id);
        }else{
            //未登陆
            $total=$this->getTotalCookie($goods_id);
        }
        echo $total;
   }
   //登陆后计算总价
   public function getTotalDb($goods_id)
   {
        $user_id=session('userData.user_id');
        $where=[
            ['user_id','=',$user_id],
            ['g.goods_id','in',$goods_id],
            ['is_del','=',1]
        ];
        $cart_model=model('Cart');
        $cartInfo=$cart_model->alias('c')->join('shop_goods g','c.goods_id=g.goods_id')->where($where)->select();
        if(!empty($cartInfo)){
            $total=0;
            foreach ($cartInfo as $k=>$v) {
                $total += $v['goods_price'] * $v['by_number'];
            }
            return $total;
        }
   }
   //不登陆计算总价
   public function getTotalCookie($goods_id)
   {
      $goods_id=explode(',',$goods_id);
      $cartInfo=cookie('cartInfo');
       // dump($goods_id);
      // dump($cartInfo);
      $info=[];
      foreach ($cartInfo as $k=>$v){
        if(in_array($v['goods_id'],$goods_id)){
            $info[$k]['goods_id']=$v['goods_id'];
            $info[$k]['by_number']=$v['by_number'];
        }
      }
      $goods_model=model('Goods');
      $where=[
        ['goods_id','in',$goods_id],
        ['is_up','=',1]
      ];
      $goodsInfo=$goods_model->where($where)->select();
      $total=0;
      foreach($goodsInfo as $kk=>$vv){
          foreach($info as $k=>$v){
            if($k==$vv['goods_id']){
              $total += $vv['goods_price'] * $v['by_number'];
            }
          }
      }
      return $total;
   }
   public function cartDel()
   {
       $goods_id=input('post.goods_id');
        if($this->checkLogin()){
            //登陆
            $total=$this->delTotalDb($goods_id);
        }else{
            //未登陆
            $total=$this->delTotalCookie($goods_id);
        }
        
   }
   //购物车删除
   public function delTotalDb($goods_id)
   {
        $user_id=session('userData.user_id');
        $where=[
            ['goods_id','=',$goods_id],
            ['user_id','=',$user_id]
        ];
        $cart_model=model('Cart');
        $del=$cart_model->where($where)->update(['is_del'=>2]);
   }
   //cookie 删除
   public function delTotalCookie($goods_id)
   {

      $cartInfo=cookie('cartInfo');
      if(!empty($cartInfo)){
          unset($cartInfo[$goods_id]);
          cookie('cartInfo',$cartInfo);
      }
   }
   //批量删除
   public function alldell()
   {
      $goods_id=input('post.goods_id');
      $cart_model=model('Cart');
      $where=[
        ['goods_id','in',$goods_id]
      ];
      $res=$cart_model->where($where)->update(['is_del'=>2]);
   }
   //加入收藏
   public function addCollect()
   {
      if($this->checkLogin()){
          //登陆
          $goods_id=input('post.goods_id');
          $user_id=session('userData.user_id');
          $collect_model=model('Collect');
          $data=['goods_id'=>$goods_id,'user_id'=>$user_id];
          $where=[
              ['goods_id','=',$goods_id],
              ['user_id','=',$user_id]
          ];
          $info=$collect_model->where($where)->find();
          if(!empty($info)){
            if($info['is_del']==1){
              return ['font'=>'已收藏','code'=>4];exit;
            }else{
              $upda=$collect_model->where($where)->update(['is_del'=>1]);
              return ['font'=>'收藏成功','code'=>3];
            }
          }
          $res=$collect_model->save($data);
          if($res){
            return ['font'=>'收藏成功','code'=>3];
          }else{
            return ['font'=>'加入收藏失败','code'=>2];
          }
      }else{
          //未登陆
          return ['font'=>'未登陆,请先登陆','code'=>1];
      }
      
   }
   //结算页面
   public function confirmSettlement()
   {
      $this->getCateInfo();//获取导航栏的数据
      $goods_id=input('param.goods_id');
      if(empty($goods_id)){
        $this->error('至少选择一种商品');
      }
      $url=$_SERVER['REQUEST_URI'];
      if(!$this->checkLogin()){
        //未登陆
        $this->error('请先登陆',url('Login/login').'?refer='.$url);

      }
      $user_id=session('userData.user_id');
      //是否有收货地址
      $addmodel=new Address;
      $user_address=$addmodel->where('user_id',$user_id)->all();
      if(count($user_address)==0){
        //没有地址
        $callbackurl=url('Cart/address').'?refer='.$url;
        $this->redirect($callbackurl);
      }
      // $goods_id=input('param.goods_id');
      // if(empty($goods_id)){
      //   $this->error('至少选择一种商品');
      // }
      foreach ($user_address as $k=>$v) {
          $user_address[$k]['province']=Area::getaddarea($v['province']);
          $user_address[$k]['city']=Area::getaddarea($v['city']);
          $user_address[$k]['district']=Area::getaddarea($v['province']);
      }

      $goods_model=model('Goods');
      $where=[
        ['g.goods_id','in',$goods_id],
        ['is_up','=','1'],
        ['user_id','=',$user_id]
      ];
      $cartInfo=$goods_model
        ->field('g.goods_id,goods_name,goods_price,goods_img,c.by_number')
        ->alias('g')
        ->join('shop_cart c','c.goods_id=g.goods_id')
        ->where($where)
        ->select();
      $sum=0;
      foreach ($cartInfo as $k=>$v) {
        $sum += $v['by_number'] * $v['goods_price'];
      }
      //总金额
      $sum=intval($sum);
      //减免金额  
      //   a)  100元减10（100元减10元，150还是减10元，每满100减10元）
      if($sum>=100 && $sum<200){
        //减免金额
        $total=$sum * 0.95;
        //应付金额
        $minus=$sum-$total;
      }
      //   b) 200-500，每满100-15元（200减15，300减30，350还是减30元）
      if(200<=$sum && $sum<1000){
        //减免金额
        $total=$sum * 0.9;
        //应付金额
        $minus=$sum-$total;
      }
      if($sum>=1000){
        //减免金额
        $total=$sum * 0.85;
        //应付金额
        $minus=$sum-$total;
      }
      
      //   d)  不满100部分不计算减免
      if($sum<100){
        //减免金额
        $total=0;
        //应付金额
        $minus=$sum-$total;
      }
      $this->assign('minus',$minus);
      $this->assign('sum',$sum);
      $this->assign('total',$total);
      $this->assign('user_address',$user_address);
      $this->assign('cartInfo',$cartInfo);
      return $this->fetch();

   }
   //积分使用页面
   public function integral()
   {
      $total=input('post.total');
      //要使用的积分
      $integral=input('post.integral');
      //判断积分够不够
      $user_id=session('userData.user_id');
      $integral_model=model('integral');
      $intInfo=$integral_model->where(['user_id'=>$user_id])->find();
      if($intInfo['integral']>$integral){
        //积分够用
        //减后的价钱
        $int=$integral/10;
        $mon=($total-$int);
        $integrals=$intInfo['integral']-$integral;
        $integral_model->where(['user_id'=>$user_id])->update(['integral' =>$integrals]);;
        return ['font'=>'积分使用成功','code'=>2,'mon'=>$mon];
      }else{
        //积分不够用
        return ['font'=>'积分不够用，您还有'.$intInfo["integral"].'积分','code'=>1,'mon'=>''];
      }
      
   }
   //地址添加页面
   public function address()
   {
      $refer=input('refer');
      $top=model('Area')->where('pid',0)->select();
      $this->assign('refer',$refer);
      $this->assign('top',$top);
      return $this->fetch();
   }
   //省市联动
   public function getsonAddress()
    {
        $id=input('post.id');
        if(!$id){
          return;
        }
        $sonlist=model('Area')->where(['pid'=>$id])->all();
        echo json_encode($sonlist);
        // $this->assign('sonlist',$sonlist);
        // dump($sonlist);
    }
    //地址添加执行页面
    public function addAddress()
    {
        $post=input('post.');
        $user_id=session('userData.user_id');
        $post['user_id']=$user_id;
        $refer=$post['refer'];
        $res=Address::create($post);
        // dump($refer);
        if($res){
          $this->redirect($post['refer']);
        }
    }
}

