<?php

namespace app\test\controller;

use think\Controller;
use think\Request;
use app\test\model\Students;
class Student extends Controller
{
   public function add()
   {
        return $this->fetch();
   }
   public function add_do()
   {
        $date=input('param.');
        $file=request()->file('image');
       $info = $file->move('./uploads');
        if($info){
          $date['image']='/uploads/'.$info->getSaveName();             
          }else{                       
             echo  $file->getError();         
      } 
        
        $a=new Students;
        $into=$a->save($date);
        if($into){
            $this->success('添加成功','list');
        }else{
            $this->error('添加失败');
        }
   }
   public function list()
   {
        $a=new Students;
        $info=$a->all();
        // var_dump($info);
        $this->assign('info',$info);
        return $this->fetch();
   }
   public function del()
   {
        $id=input('param.id');
        $a=new Students;
        $del=$a->destroy($id);
         if($del){
            $this->success('删除成功','list');
        }else{
            $this->error('删除失败');
        }
   }
}
