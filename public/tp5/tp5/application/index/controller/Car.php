<?php

namespace app\index\controller;
use app\index\model\Collect;
use think\Controller;
use think\Request;
use app\index\model\Car as Carmodel;
class Car extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $dat=$this->getCar();
        $this->assign('dat',$dat);
        // dump($dat);
        return $this->fetch();
    }
    //加入购物车
    public function getCar()
    {
        $user=$this->checkLogin();
        if($user){
            //登陆
            return  $this->addDBCar();
        }else{
            //没有登陆
            return $this->addCookieCar();
        }
    }
    //没有登陆加入购物车
    public function addCookieCar()
    {
        $history=json_decode(cookie('car'),true)?:[];
        // dump($history);
        // array_multisort(array_column($history['add_time'],$history),SORT_DESC,SORT_NUMERIC);
        return $history;
    }
    //登陆加入购物车
    public function addDBCar()
    {
        $where=[
            'user_id'=>session('indexsession')['id'],
        ];
        $data=Carmodel::where($where)->select();
        return $data;
    }
    //计算价格
    public function getMoney()
    {
        $goods_id=input('post.goods_id'); 

        $user_id=session('indexsession')['id'];
        // dump($user_id);
        if(!$goods_id){
            return number_format(0,2,'.','');
        }
        // dump(1);
        if($this->checkLogin()){
            //登陆成功
           

            if(is_array($goods_id)){
                $goods_id=implode(',', $goods_id);
                $price=Carmodel::getMoney($goods_id,$user_id);
            }
        }else{
            //未登录
            $price=$this->getCookieMoney($goods_id);
            // $price=$goods_id;
        }
        
        echo $price;
    }
    public function getCookieMoney($goods_id)
    {
        // dump($goods_id);
        $car=json_decode(cookie('car'),true)?:[];
        if(!$car){
            // return 0;
            return number_format(0,2,'.','');
        }
        $total=0;
        foreach($goods_id as $v){
            $total += $car['car_'.$v]['by_number']*$car['car_'.$v]['shop_price'];
        }
        echo $total;
        return number_format(0,2,'.','');
    }
    //购物车删除
    public function delete()
    {
        $goods_id=input('post.delgoods_id');
        if(!$goods_id){
            return;
        }
        if($this->checkLogin()){
            //登陆之后的删除
            $where=[
                ['user_id','=',session('indexsession')['id']],
                ['goods_id','in',$goods_id]
            ];
            // dump($goods_id);
            Carmodel::where($where)->delete();
        }else{
            //未登陆的删除
            // dump($goods_id);
            $car=json_decode(cookie('car'),true)?:[];
            // dump($car);die;
            if(strpos($goods_id,',')){
                //批量删除  将字符串分割成数组
                $goods_id_arr=explode(',',$goods_id);
                foreach($goods_id_arr as $v){
                    unset($car['car_'.$v]);
                    // dump($v);
                }
            }else{
                //单删
                unset($car['car_'.$goods_id]);
            }
            cookie('car',json_encode($car));
        }
        // echo json_encode(['sa'=>00000,'msg'=>'删除成功']);
    }
    //加入收藏
    public function collect()
    {
        $goods_id=input('post.goods_id');
        if(!$this->checkLogin()){
            //未登陆不能加入收藏
            echo json_encode(['cdoe'=>'00001','msg'=>'未登陆，是否登陆']);
        }else{
            //登陆后加入收藏
            $where=[
                'user_id'=>session('indexsession')['id'],
                'goods_id'=>$goods_id,
            ];
            $colle=Collect::where($where)->find();
            if($colle){
                echo json_encode(['cdoe'=>'00002','msg'=>'已收藏，请勿重复收藏']);return;
            }
            $array=[
                'user_id'=>session('indexsession')['id'],
                'goods_id'=>$goods_id,
                'add_time'=>time()
            ];
            $cat=Collect::insert($array);
            if($cat){
                echo json_encode(['cdoe'=>'00002','msg'=>'收藏成功']);return;
            }
            // dump($array);
        }
    }
    //积分
    public function member()
    {
        $money=input('param.money');
        $id=session('indexsession')['id'];
        $upd=\Db::name("index_user")->where('id',$id)->find();
        if(!$upd==""){
            $money += $upd['jifen'];
        }

        $upd=\Db::name("index_user")->where('id',$id)->update(['jifen'=>$money]);

    }

    
}
