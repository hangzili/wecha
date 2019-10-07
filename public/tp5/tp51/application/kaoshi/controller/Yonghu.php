<?php

namespace app\kaoshi\controller;

use think\Controller;
use think\Request;
use app\kaoshi\model\Yonghus;
class Yonghu extends Controller
{
   public function add()
   {
        return $this->fetch();
   }
   public function add_do()
   {
        $date=input('param.');
        // var_dump($date);
        $a=new Yonghus;
        $info=$a->save($date);
        // var_dump($info);
        if($info){
            $this->success('添加成功','list');
        }
   }
   public function list()
   {
        $a= new Yonghus;
        $sou=input('param.yname');
        $where=[];
        $query=[];
        if(input('?param.yname')){
            $where[]=['yname','like','%'.input('param.yname').'%'];
            $query['yname']=input('param.yname');
        }
        
        $list=$a->where($where)->paginate(6,falise,['query'=>$query]);
        // var_dump($list);
        $this->assign('list',$list);
        return $this->fetch();
   }



   public function del()
   {
        $id=input('param.id');
        // var_dump($id);
        $a=new Yonghus;
        $del=$a->destroy($id);
        if($del){
            $this->success('删除成功','list');
        }
   }
   public function upd()
   {
        $id=input('param.id');
        $a=new Yonghus;
        $upd=$a->find($id);
        $this->assign('upd',$upd);
        return $this->fetch();
   }
}
