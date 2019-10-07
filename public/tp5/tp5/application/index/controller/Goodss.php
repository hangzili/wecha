<?php

namespace app\index\controller;
use app\index\model\Goods;
use think\Controller;
use think\Request;
use app\index\model\Histroy;
use app\index\model\Car;
class Goodss extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $id=input('param.id');
        // dump($id);
        //$a=model('Goods');

        $goods=Goods::where('goods_id',$id)->find();
        // dump($goods);die;
        $this->addHistory($id);
        $this->assign('goods',$goods);
        return $this->fetch();
        
    }
    
    public function addHistory($id){
    //调用Base里面  checkLogin 是否登陆 
        $user=$this->checkLogin($id);
        if($user){
            //登陆
            $this->addDBHistrory($id);
        }else{
            //没有登陆
            $this->addCookieHistory($id);
        }
    }
    //没有登陆
    public function addCookieHistory($id)
    {
        // dump(cookie('history'),true);
        // 转化为数组 — 对 JSON 格式的字符串进行编码 
        $history=json_decode(cookie('history'),true)?:[];
        // dump($history);
        $arr['goods_'.$id]=[
            'goods_id'=>$id,
            'add_time'=>time()
        ];
        $data=array_merge($history,$arr);
        // dump($data);
        // 将data赋值给cookie
        cookie('history',json_encode($data));
    }
    //登陆
    public function addDBHistrory($id)
    {
        $where=[
            'user_id'=>session('indexsession')['id'],
            'goods_id'=>$id,
        ];
        $a=Histroy::where($where)->find();
        if(!$a==""){
            $b=Histroy::where($where)->update(['add_time'=>time()]);
            // echo Histroy::getlastsql($b);
        }else{
            $data=[
                'add_time'=>time(),
                'goods_id'=>$id,
                'user_id'=>session('indexsession')['id'],
            ];
            // Histroy::create($data);
            \Db::name('Histroy')->insert($data);
        }
         // dump($data);
    }
    //添加购物车
    public function addCat()
    {
        $goods_id=input('post.goods_id');
        $by_number=input('post.by_number');
        
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
        echo   json_encode(['code'=>'2','msg'=>'success']);die;
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
            echo   json_encode(['code'=>'2','msg'=>'success']);die;
        }
    }
    //购物车页面商品的加减
    public function checkNumber()
    {
            //商品的id
        $goods_id=input('param.goods_id');
            //购物车中的数量
        $by_number=input('param.by_number');
            //获取商品的库存
        $goods_number=Goods::where('goods_id',$goods_id)->value('goods_number');
            //判断购物车是否超过库存
        if($by_number>$goods_number){
            $by_number=$goods_number;
        }
        if($this->checkLogin()){
                //如果登陆就修改数据库
            Car::where(['user_id'=>session('indexsession')['id'],'goods_id'=>$goods_id])->update(['by_number'=>$by_number]);

        }else{
                //如果不登陆就修改cookie
            $car=json_decode(cookie('car'),true)?:[];
            $car['car_'.$goods_id]['by_number']=$by_number;
            cookie('car',json_encode($car));
        }
        echo $by_number;

    }


   
}
