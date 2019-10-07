<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Advert extends Controller
{
    //广告位添加
   public function create()
   {
        return view();
   }
   //添加执行页面
   public function createdo()
   {
        $post=input('post.');
        $advert_model=model('Advert');
        $res=$advert_model->save($post);
        if($res){
            $this->success('添加成功',url('Advert/index'));
        }else{
            $this->error('添加失败');
        }
   }
   //广告位展示
   public function index()
   {
        $advert_model=model('Advert');
        $res=$advert_model->all();
        $this->assign('res',$res);
        return view();
   }
}
