<?php

namespace app\index\controller;
use app\index\model\Cat;
use think\Controller;
use app\index\controller\Base;
use think\Request;
use app\index\model\Goods;
class Index extends Base
{
    //最大的展示页面
   public function index()
   {
    

   
    
            //获取一级分类
        $top_name=Cat::where('parent_id','0')->find()->toArray();
            // dump($top_name);
            // 获取二级分类
        $second_cat=Cat::where('parent_id',$top_name['cat_id'])->all()->toArray();
            // dump($second_cat);
            // 查询所有
        $cate_data=Cat::all()->toArray();
            //查询所有的子分类
        $cate_data=createTree($cate_data,$top_name['cat_id']);
        // dump($cate_data);
            //返回数组的制定一列
        $cate_data=array_column($cate_data,'cat_id');

            //再数组开头插入一个或多个元素
        array_unshift($cate_data,$top_name['cat_id']);
            // dump($cate_data);
        $where=[
           ['cat_id','in',$cate_data]
        ];
            // dump($where);
        
        $goods=Goods::getGoodsByWhere($where);

        $hot=Goods::getGoodsByWhere(['is_hot'=>1,'is_on_sale'=>1]);
        // dump($hot);
        $this->assign('hot',$hot);
        $this->assign('top_name',$top_name);
            // dump($top_name);
        $this->assign('second_cat',$second_cat);
            // dump($second_cat);
        $this->assign('goods',$goods);
            // dump($goods);
        
        return $this->fetch();
    }
    //点击加载更多
    public function ajaxgetfloor(){
        $this->view->engine->layout(false);
        $cat_id=input('post.cat_id');
        $floor_num=input('post.floor_num');
        $floor_num=$floor_num+1;
        $where=[
            ['parent_id','=',0],
            ['cat_id','>',$cat_id]
        ];
        //查询下一个大分类
        $top_name=Cat::where($where)->order('cat_id')->find()->toArray();
        if(!$top_name){return;}


        $second_cat=Cat::where('parent_id',$top_name['cat_id'])->all()->toArray();
        // dump($second_cat);
        // 子分类
        $cate_data=Cat::all()->toArray();

        $cate_data=createTree($cate_data,$top_name['cat_id']);
        // dump($cate_data);
            //返回数组的制定一列
        $cate_data=array_column($cate_data,'cat_id');

            //再数组开头插入一个或多个元素
        array_unshift($cate_data,$top_name['cat_id']);
            // dump($cate_data);
        $where=[
           ['cat_id','in',$cate_data]
        ];
            // dump($where);
        //获取商品
        $goods=Goods::getGoodsByWhere($where);
        // dump($goods);
        $this->assign('top_name',$top_name);
        // dump($top_name);
        $this->assign('second_cat',$second_cat);
        // dump($second_cat);
        $this->assign('goods',$goods);
        //第几层 1 2 3 
        $this->assign('floor_num',$floor_num);

        // dump($goods);
        // 渲染默认模板输出
        return view('index/ajaxgetfloor');
        
    }

}
