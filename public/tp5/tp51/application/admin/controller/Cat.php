<?php

namespace app\admin\controller;
use app\admin\model\Cat as model;
use think\Controller;
use think\Request;
use app\admin\validate\Cat as vali;
class Cat extends Controller
{
   public function add()
   {
        return $this->fetch();
   }
   public function add_do()
   {
        
        $data=input('post.');
        $a=new model;
        $into=$a->save($data);
        // dump($into);
        if($into){
            $return = ['ret'=>1,'asd'=>'添加成功'];
        }else{
            $return =['ret'=>0,'asd'=>'失败'];
        }
        echo json_encode($return);
   }
   public function upload(){
        $file = request()->file('img');
        $info = $file->move( './uploads');
        if($info){
        return '/uploads/'.$info->getSaveName();
        }else{
         return $file->getError();
        }
    }
    public function list()
    {
        $a=new model;
        $namee=input("param.namee");
        $where=[];
        if(!empty($namee)){
            $where[]=['namee','like',"%$namee%"];
        }
        $list=$a->where($where)->paginate(2);
        // dump($list);
        $page=$list->render();
        if(request()->isAjax()){
            $list=$list->toArray();
            $list['page']=$page;
            echo json_encode($list);die;
        }
        $this->assign("list",$list);
        $this->assign("page",$page);
        return $this->fetch();
    }
    public function upda()
    {
        $data=input('param.');
        $a=new model;
        $da=$a->update($data);
        dump($da);
    }
}
