<?php

namespace app\admin\controller;
use app\admin\model\Discount as model;
use think\Controller;
use think\Request;
use app\admin\model\Cat;
class Discount extends Base
{
    //添加页面
    public function add()
    {
        //分类
        $cat=\Db::name('Cat')->all();
        $cat=createTree($cat);
        $this->assign('cat',$cat);
        return $this->fetch();
    }
    //添加执行
    public function add_do()
    {
        $data=input('post.');
        if(empty($data['d_number'])){
            $this->error('优惠券张数不能未空');
        }
        $a=new model;
        $into=$a->save($data);
        if($into){
            $this->success('添加成功','list');
        }
    }
    public function list()
    {
        $list=model::join('cat','cat.cat_id=Discount.d_cat')->paginate(2);
        // dump($list);
        $this->assign('list',$list);
        return $this->fetch();
    }
}
