<?php
namespace app\index\controller;
use think\Controller;

class Index extends Common
{
    public function index()
    {
        $this->getCateInfo();//需要的地方调用common这个方法
        
        // 获取楼层数据.准备查询分类表的分类，子分类，商品表的信息
        $cate_id = 1;
       $info = $this->getFloorInfo($cate_id);
        //  exit;
        $this->assign('info',$info);
        //获取热门商品
        $goods_model=model('Goods');
        $host_goods=$goods_model->where('is_hot',1)->all();
        $this->assign('host_goods',$host_goods);
        return $this->fetch();//显示前台视图
    }
    //获取楼层数据
    public function getFloorInfo($cate_id){
        $cmodel = model('Category');
        //根据分类id获取顶级分类的信息  find()一维数组
        // select * from shop_category where cate_id in (1,6,7,8,21,22,23,24,25,26)
        $cwhere = [
            ['cate_id','=',$cate_id],
        ];
        $info['topInfo'] = $cmodel
        ->field('cate_id,cate_name')
        ->where($cwhere)
        ->find();
        // dump($topInfo);

        // 根据分类id获取当前子分类下的子类信息select();
            //select * form shop_category where parent_id = $cate_id 
        $swhere = [
            ['parent_id','=',$cate_id],
        ]; 
        $info['sonInfo'] = $cmodel
        ->field('cate_id,cate_name')
        ->where($swhere)
        ->select();
        // dump($sonInfo);
        // 根据分类id查询当前分类下的商品信息 select();
        $cateInfo = $cmodel->select();
        $new_id = getCateId($cateInfo,$cate_id);
        // dump($new_id);
        $gmodel = model('Goods');
        $gwhere = [
            ['cate_id','in',$new_id],
        ];
        $info['goodsInfo'] = $gmodel->where($gwhere)->select();
        return $info;
    }

    //获取下一个楼层数据
    public function getMoreFloor()
    {
        $cate_id = input('post.cate_id');
        $floor_num = input('post.floor_num');
        // dump($floor_num);
        $floor_num = $floor_num+1;
        //  dump($floor_num);exit;
        $where = [
            ['cate_id','>',$cate_id],
            ['parent_id','=',0],
        ];
        $cmodel = model('Category');
        $next_id = $cmodel
        ->where($where)
        ->order('cate_id','asc')
        ->limit(1)
        ->value('cate_id');//按照cate_id查询 正序 查一条，  value查一个值   column查询一列一维数组
        // dump($next_id);//select 多条二维数组  find 一条一维数组
        $info = $this->getFloorInfo($next_id);

        $this->view->engine->layout(false);//这里有其他页面的layout;所以要关闭
        $this->assign('info',$info);
        $this->assign('floor_num',$floor_num);
        // dump($floor_num);exit;
        echo $this->fetch('newdiv');

    }
    public function han()
    {
        $this->error('白点了，这🐎东西都没有');
    }


    
}
