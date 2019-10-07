<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Collect extends Common
{
    //收藏展示页面
   public function index()
   {
        if(!$this->checkLogin()){
           $this->error('请先登陆',url('login/login')); 
        }
        $user_id=session('userData.user_id');
        $collect_model=model('Collect');
        $count=$collect_model->where(['user_id'=>$user_id])->count();
        $where=[
            ['user_id','=',$user_id],
            ['is_up','=',1],
            ['is_del','=',1]
        ];
        $collectInfo=$collect_model
            ->field('goods_price,goods_num,goods_img,goods_name,c.goods_id')
            ->alias('c')
            ->join('shop_goods g','g.goods_id=c.goods_id')
            ->where($where)
            ->select();
        $this->assign('count',$count);
        $this->assign('collectInfo',$collectInfo);
        return $this->fetch();
   }
   //收藏删除页面
   public function delete()
   {
        $user_id=session('userData.user_id');
        $goods_id=input('post.goods_id');
        $collect_model=model('Collect');
        $where=[
            ['user_id','=',$user_id],
            ['goods_id','=',$goods_id],
            ['is_del','=',1]
        ];
        $res=$collect_model->where($where)->update(['is_del'=>2]);
   }
}
