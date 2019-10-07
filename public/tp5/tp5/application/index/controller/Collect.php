<?php

namespace app\index\controller;
use app\index\model\Goods;
use app\index\model\Car;
use think\Controller;
use think\Request;
use app\index\model\Collect as model;
class Collect extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $user_id=session('indexsession');
        $where=[
            'user_id'=>$user_id
        ];
        $list=model::where($where)->field('goods_name,goods_img,shop_price,collect.goods_id')->join('goods','goods.goods_id=Collect.goods_id')->select();
        // dump($list);
        $this->assign('list',$list);
        // dump($list);
        return $this->fetch();
    }
    public function del()
    {
        $goods_id=input('post.goods_id');
        $user_id=session('indexsession')['id'];
        $where=[
            'goods_id'=>$goods_id,
            'user_id'=>$user_id
        ];
        $del=model::where($where)->delete();
        echo '删除成功';
    }
     //加入购物车
    public function addCat()
    {
        $goods_id=input('post.goods_id');
        $by_number=1;
        // dump($goods_id);
        $user=$this->checkLogin();
        //添加购物车
        if($user){
            //登陆
            $this->addDBCar($goods_id,$by_number);
        }else{
            //没有登陆
            $this->addCookieCar($goods_id,$by_number);
        }
    }
    //没有登陆添加购物车
    public function addCookieCar($goods_id,$by_number)
    {
        $cat=json_decode(cookie('car'),true)?:[];
        // dump($cat);
        // $cat=$cat->toArray();
        $goods=Goods::find($goods_id);
        // dump($goods);
        // 库存不足
        if($goods['goods_number']<$by_number){
            echo    json_encode(['code'=>'1','msg'=>'商品库存不足']);die;
        }
        if(array_key_exists('car_'.$goods_id,$cat)){
            $cat['car_'.$goods_id]['by_number'] += $by_number;
            if($goods['goods_number']<$by_number){
                echo    json_encode(['code'=>'1','msg'=>'商品库存不足']);die;
            }
        }else{
            $array['car_'.$goods_id]=[
                'goods_id'=>$goods_id,
                'by_number'=>$by_number,
                'shop_price'=>$goods['shop_price'],
                'goods_name'=>$goods['goods_name'],
                'goods_img'=>$goods['goods_img'],
                'add_time'=>time(),
            ];
            $cat=array_merge($cat,$array);
            // dump($data);
        }
        // dump($array);
        cookie('car',json_encode($cat));
        echo   json_encode(['code'=>'2','msg'=>'as']);die;
    }
    //登陆添加购物车
    public function addDBCar($goods_id,$by_number)
    {
        $where=[
            'user_id'=>session('indexsession')['id'],
            'goods_id'=>$goods_id,
        ];
        $goods=Goods::find($goods_id);
        $car=Car::where($where)->find();
        // echo ($goods['goods_number']);
        if($goods['goods_number']<$by_number){
            echo    json_encode(['code'=>'1','msg'=>'商品库存不足']);die;
        }
        // dump($car);
        if($car){
            $car['by_number'] += $by_number;
            if($goods['goods_number']<$by_number){
                echo    json_encode(['code'=>'1','msg'=>'商品库存不足']);die;
            }
            $car['add_time'] += time();
            $res=Car::where('c_id',$car['c_id'])->update($car->toArray());
            // dump($res);
        }else{
            
            $array=[
                    'user_id'=>session('indexsession')['id'],
                    'goods_id'=>$goods_id,
                    'by_number'=>$by_number,
                    'shop_price'=>$goods['shop_price'],
                    'goods_name'=>$goods['goods_name'],
                    'goods_img'=>$goods['goods_img'],
                    'add_time'=>time(),
                ];
            // dump($array);
            $res=\Db::name('Car')->insert($array);
        }
        if($res){
            echo   json_encode(['code'=>'2','msg'=>'as']);die;
        }
    }

    
}
