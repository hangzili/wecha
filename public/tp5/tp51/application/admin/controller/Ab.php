<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Abs;
class Ab extends Controller
{
   public function add()
   {
        return $this->fetch();
   }
   public function add_do()
   {
        $a= new Abs;
        $date=input('param.');
        $info=$a->save($date);
        // var_dump($info);
        if($info){
            $this->success('添加成功','list');
        }else{
            $this->error('添加失败');
        }
   }
   public function list()
   {
        $a= new Abs;
        $list= $a->all();
        $this->assign('list',$list);
        return $this->fetch();
        // var_dump($list);
   }
   public function del()
   {
        $id=input('param.id');
        $a= new Abs;
        $del=$a->destroy($id);
        // var_dump($del);
        if($del){
            $this->success('删除成功','list');
        }else{
            $this->error('删除失败');
        }
   }
   public function upd()
   {
        $id=input('param.id');
        $a= new Abs;
        $info=$a->get($id);
        $this->assign('info',$info);
        return $this->fetch();
        // var_dump($info);
   }
   public function upd_do()
   {
        $id=input('param.id');
        $date=input('param.');
        $a= new Abs;
        $info=$a->save($date,$id);
        // var_dump($info);
        if($info){
            $this->success('修改成功','list');
        }else{
            $this->error('修改失败');
        }
   }
}
