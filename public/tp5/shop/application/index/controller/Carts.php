<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Goods;
use app\index\model\Carts as model;
class Carts extends Common
{
    //添加页面
    public function addCar()
    {
        $post=input('post.');
        $post['add_time']=time();
        if($this->checkLogin()){
            //登陆
            $res=$this->addCartsDb($post);
        }else{
            //未登陆
            $res=$this->addCartsCookie($post);
        }
        echo json_encode($res);
    }
    //登陆添加页面
    public function addCartsDb($post)
    {
        $goods_id=$post['goods_id'];
        $user_id=session('userData.user_id');
        $where=[
            ['goods_id','=',$goods_id],
            ['user_id','=',$user_id]
        ];
        //判断数据库里面有没有这条数据
        $carts_goods=model::where($where)->find();
        if(!empty($carts_goods)){
            //客户已经收藏过
            $by_number=$carts_goods['by_number'] + $post['by_number'];
            //判断商品库存够不够
            $goods_num=Goods::where('goods_id',$post['goods_id'])->value('goods_num');
            if($by_number>$goods_num){
                $by_number=$goods_num;
            }
            $time=time();
            $res=model::where($where)->data(['by_number' =>$by_number,'add_time'=>$time])->update();
            return ['font'=>'','res'=>'1'];
        }else{
            //客户没有收藏过
            //判断商品库存够不够
            $goods_num=Goods::where('goods_id',$post['goods_id'])->value('goods_num');
            if($post['by_number']>$goods_num){
                $post['by_number']=$goods_num;
            }
            $post['user_id']=$user_id;
            $add=model::insert($post);
            return ['font'=>'','res'=>'1'];
        }
    }
    //未登录添加页面
    public function addCartsCookie($post)
    {
        $carts=cookie('carts');
        if(!empty($carts)){
            //cookie不为空
            if(array_key_exists($post['goods_id'],$carts)){
                //cookie里面有没有这个商品  有
                $by_number=$carts[$post['goods_id']]['by_number'] + $post['by_number'];
                //判断商品库存够不够
                $goods_num=Goods::where('goods_id',$post['goods_id'])->value('goods_num');
                if($by_number>$goods_num){
                    $by_number=$goods_num;
                }
                $carts[$post['goods_id']]['by_number']=$by_number;
                $carts[$post['goods_id']]['add_time']=time();
                cookie('carts',$carts);
                return ['font'=>'','res'=>'1'];
            }else{
                //没有
                $carts[$post['goods_id']]=$post;
                cookie('carts',$carts);
                return ['font'=>'','res'=>'1'];
            }
            
        }else{
            //cookie为空
            $goods_num=Goods::where('goods_id',$post['goods_id'])->value('goods_num');
            if($post['by_number']>$goods_num){
                $post['by_number']=$goods_num;
            }
            $carts[$post['goods_id']]=$post;
            cookie('carts',$carts);
            return ['font'=>'','res'=>'1'];
        }
        
    }
    //展示页面
    public function list()
    {
        if($this->checkLogin()){
            //登陆
            $this->getCartDb();
        }else{
            //未登陆
            $this->getCartCookie();
        }
        return view();
    }
    //登陆后展示
    public function getCartDb()
    {
        $user_id=session('userData.user_id');
        $carts_goods=model::where('user_id',$user_id)->all();
        $where=[
            ['user_id','=',$user_id]
        ];
        $list=model::alias('c')->field('g.goods_name,goods_img,goods_price,c.by_number')->join('shop_goods g','g.goods_id=c.goods_id')->where($where)->order('c.add_time','desc')->select();
        dump($list);
    }
    //未登陆展示
    public function getCartCookie()
    {
        $dara=cookie('carts');
        $goods_id=array_column($dara,'goods_id');
        $where=[
            ['goods_id','in',$goods_id]
        ];
        $goods_id=implode(',',$goods_id);
        $exp=new \think\db\Expression("field(goods_id,$goods_id)");
        $goods=Goods::field('goods_name,goods_id,goods_price,goods_img')->where($where)->order($exp)->all()->toArray();
        foreach ($goods as $k=> $v) {
            $goods[$k]=array_merge($v,$dara[$v['goods_id']]);
        }
        dump($goods);
        // dump($goods_id);
    }
   
}
