<?php

namespace app\index\controller;
use app\index\model\Cat;
use app\index\model\Car;
use app\index\model\Collect;
use think\Controller;
use think\Request;
use app\index\controller\Base;
use app\index\model\Goods;
use app\admin\model\brand;
use app\index\model\Histroy;
class Lists extends Base
{
    public function index()
    {
	$id=input('param.cat_id');

    	// dump($id);
    	//查询所有的分类用于求子分类
    	$data=Cat::all()->toArray();
    	//通过递归求大分类下的所有子分类
    	$son=createTree($data,$id);
    	//获取所有分类中的cat_id用于查询商品
    	$cat_id=array_column($son,'cat_id');
    		// dump($son);
    	//将大分类也加里面
    	$cat_ids=array_push($cat_id,$id);
    		// dump($cat_ids);
    	$where=[
    		['cat_id','in',$cat_id],
    		['is_on_sale','=',1],
    	];
    	// dump($where);
    		//查询商品中于品牌关联的求品牌
    	$dat=Goods::where($where)->column('brand_id');
    	
    	$brand=\Db::name('brand')->where([['id','in',$dat]])->all();
    	// dump($brand);
    	

    	$price=Goods::where($where)->max('shop_price');
    	// dump($price);
    	// 价格
    	$keyname=input('get.');
    	$prices=$keyname['price']??"";
    	$brands=$keyname['brand']??"";
    	//field默认搜素
    	$field=$keyname['field']??1;
    	$orderby=$keyname['orderby']??1;

    	
    	if($brands){
    		$where[]=['brand_id','=',$brands];
    	};
    	if($prices){
    		$pricess=explode('-',$prices);
    		if(isset($pricess[0])){
    			$where[]=['shop_price','>=',intval($pricess[0])];
    		}
    		if(isset($pricess[1])){
    			$where[]=['shop_price','<=',intval($pricess[1])];
    		}
    	};
    	$order=['goods_id','desc'];
    	if($field){
    		$field_array=['1'=>'add_time','2'=>'goods_number','3'=>'shop_price','4'=>'is_new'];
    		$orderby_array=['1'=>'asc','2'=>'desc'];
	    		if($field==4){
	    			$where[]=['is_on_sale','=',1];
	    		}else{
		    		$order=[
		    			$field_array[$field]=>$orderby_array[$orderby]
		    		];
	    		}
    	}
    	// dump($order);

    	$count=Goods::where($where)->count();
    	$goods=Goods::where($where)->order($order)->paginate(1,false,['query'=>$keyname]);
    	
    	// dump($where);
    	
    	// echo Goods::getLastsql();
    	$arr=$this->getmaxprice($price);
        //获取浏览记录
        
        $history=$this->getHistory($id);
        // dump($history);
        // $history=[];
        $this->assign('history',$history);

    	$this->assign('arr',$arr);
    	$this->assign('count',$count);
    	$this->assign('field',$field);
    	$this->assign('prices',$prices);
    	$this->assign('brands',$brands);
    	$this->assign('id',$id);
    	$this->assign('keyname',$keyname);
    	$this->assign('brand',$brand);
    	$this->assign('goods',$goods);
        return $this->fetch();
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
    public function getHistory($id){
        //Base页面的判断是否登陆
        $user=$this->checkLogin($id);
        // dump($user);
        if($user){
            //登陆
            return $this->getDBHistrory();
        }else{
            //未登录
            return $this->getCookieHistory();
        }
    }
    //登陆
    public function getDBHistrory()
    {
        $where=[
            'user_id'=>session('indexsession')['id'],
        ];
        $data=Histroy::where($where)->order('add_time','desc')->limit(4)->all()->toArray();
        $goods_id=array_column($data,'goods_id');
        $where=[
            ['goods_id','in',$goods_id]
        ];
        $order=[];
        if(!empty($data)){
            $order=['goods_id'=>$goods_id];
        }
        
        $goods=Goods::field('goods_id,goods_name,shop_price,goods_img')->where($where)->limit(4)->order($order)->select();
        // dump($goods);
        return $goods;

    }
    //未登陆
    public function getCookieHistory()
    {
        $history=json_decode(cookie('history'),true)?:[];
        //对数组进行排序 SORT_DESC按照下降顺序排序   将项目按照数值比较
        array_multisort(array_column($history,'add_time'),SORT_DESC,SORT_NUMERIC,$history);
        //从数组中取出一条
        if(!count($history)){
            return;
        }
        $goods_id=array_column($history,'goods_id');
        $where=[
            ['goods_id','in',$goods_id]
        ];
        //查询商品
        $goods=Goods::field('goods_id,goods_name,shop_price,goods_img')->where($where)->order(['goods_id'=>$goods_id])->select();
        // dump($goods);
        return $goods;
    }

    public function getmaxprice($price)
    {
    	if(!$price){
    		return ;
    	}
    	$arr=[];
    	$brr=1;
    	$max=ceil($price/7);
    	for($i=0;$i<7;$i++){
    		$ca=$i*($max+1);
    		$end=$i==6?$price:$max*($i+1);
    		$arr[]=$ca."-".$max*($i+1);
    	}
    	$arr[]=$price.'以上';
    	return $arr;
    }




    //加入购物车
    public function addCat()
    {
        $goods_id=input('post.goods_id');
        $by_number=1;
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

