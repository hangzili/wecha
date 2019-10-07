<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Labei;
class Labei extends Controller
{
   public function __construct(){
    parent::__construct();
    if(!session('?username')){
      $this->redirect('Login/index');
    }
  }
   public function add()
   {
        // echo 213;
        return $this->fetch();
   }
   public function add_do()
   {
        $date=input('param.');
        $a= new Labei;
        $info=$a->save($date);
        if($info){
            $this->success('添加成功','Labei_list');
        }
   }
   public function labei_list()
   {
        $a= new Labei;
        $list=$a->all();
        $this->assign('list',$list);
        return $this->fetch();
        // var_dump($list);
   }
   public function del()
   {
        $id=input('param.id');
        $a=new Labei;
        $del=$a->destroy($id);
        if($del){
            $this->success('删除成功','Labei_list');
        }
   }
   public function upd()
   {
        $id=input('param.id');
        $a=new Labei;
        $info=$a->get($id);
        $this->assign('info',$info);
        return $this->fetch();
   }
   public function upd_do()
   {
        $date=input('param.');
        $id=input('post.id');
        $a= new Labei;
        $upd=$a->save($date,['id'=>$id]);
        if($del){
          $this->success('修改成功','Labei_list');
        }else{
          $this->seccess('修改失败');
        }
   }
}
