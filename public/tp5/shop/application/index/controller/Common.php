<?php
namespace app\index\controller;
use think\Controller;

class Common extends Controller
{
    /**查询导航 左侧分类数据 */
    function __construct()
    {
        parent::__construct();
        

    }
    /**查询导航 左侧分类数据 */
    function getCateInfo()
    {
        // 导航数据
        $cmodel = model('Category');
        $where=[
            ['parent_id','=',0],
            ['cate_nav_show','=',1],
        ];
        $navInfo = $cmodel->where($where)->limit(7)->select();
        // dump($navInfo);exit;
        // 左侧分类数据
        $cwhere=[
            
            ['cate_show','=',1],
        ];
        $cInfo = $cmodel->field('cate_id,cate_name,parent_id')->where($cwhere)->select()->toArray();
         
       
        // 调用函数分类处理数据
        $cateInfo=CreateTree($cInfo);
        // print_r($cateInfo);exit;
        if($this->checkLogin()){
            //登陆从数据库里面度数据
            $cart=$this->getCateInfoDb();
        }else{
            //没登陆从cookie里面度数据
            $cart=$this->getCateInfoCookie();
        }
        $this->assign('cart',$cart);
        $this->assign('navInfo',$navInfo);
         $this->assign('cateInfo',$cateInfo);


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
    function checkLogin(){
        return session("?userData");
    }
    //浏览记录同步
    function asyncHistory()
    {
        $data=cookie('data');
        if(!empty($data)){
            $user_id=session('userData.user_id');
            foreach($data as $k=>$v){
                $data[$k]['user_id']=$user_id;
            }
            $History_model=model('History');
            $res=$History_model->saveALL($data);
            if($res){
                cookie('data',null);
            }
        }
    }
    //检查库存是否够
   public function checkByNumber($by_number,$goods_id,$cartes=0)
   {
        $by_number += $cartes;
        $goods_model=model('Goods');
        $goodsInfo=$goods_model->where('goods_id',$goods_id)->value('goods_num');
        if($by_number>$goodsInfo){
            //库存不足
            return ['font'=>'库存不足，最多购买'.($goodsInfo-$cartes).'件','res'=>'2','by_number'=>$goodsInfo];
        }else{
            return true;
        }
   }
   //加入购物车同步  获取cookie里面的值，判断用户购物车里面有没有，如果没有就添加，如果有就更新  判断所有的加起来有没有比库存多
   public function asyncCart()
   {
        $data=cookie('cartInfo');
        if(!empty($data)){
            $cart_model=model('Cart');
            $user_id=session('userData.user_id');
            foreach ($data as $k=>$v) {
                $where=[
                    ['goods_id','=',$v['goods_id']],
                    ['user_id','=',$user_id]
                ];
                $info=$cart_model->where($where)->find();
                $by_number=$info['by_number'] + $v['by_number'];

                $result=$this->checkByNumber($v['by_number'],$v['goods_id'],$info['by_number']);
                if(is_array($result)){
                    $by_number=$result['by_number'];
                }
                //判断库里有没有，如果有就更新
                if(!empty($info)){
                    $cart_model->where($where)->update(['by_number'=>$by_number,'create_time'=>time()]);
                }else{
                    $v['user_id']=$user_id;
                    $cart_model->save($v);
                }
            }
            cookie('cartInfo',null);
        }else{
            return true;
            cookie('cartInfo',null);
        }
    }
    
}

 