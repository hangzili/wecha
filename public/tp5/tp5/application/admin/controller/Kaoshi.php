<?php

namespace app\admin\controller;
use app\admin\model\Kaoshi as model;
use think\Controller;
use think\Request;

class Kaoshi extends Controller
{
   //添加页面
   public function add()
   {
        return $this->fetch();
   }
   //添加执行
   public function add_do()
   {
        $data=input('post.');
        $namee=$data['namee'];
        if($namee==""){
            $arr=['ret'=>1,'sad'=>'公告不能为空'];
            echo json_encode($arr);die;
        }
        if(strlen($namee)>30){
            $arr=['ret'=>1,'sad'=>'公告长度不能超过30'];
            echo json_encode($arr);die;
        }
        $a=new model;
        $one=$a->where('namee',$namee)->find();
        if($one){
            $arr=['ret'=>1,'sad'=>'公告名称重复'];
            echo json_encode($arr);die;
        }

        $data['add_time']=time();
        
        $info=$a->save($data);
        if($info){
            $arr=['ret'=>1,'sad'=>'添加成功'];
        }else{
            $arr=['ret'=>0,'sad'=>'添加失败'];
        }
        echo json_encode($arr);
   }
   //展示
   public function list()
   {
        $a=new model;
        $list= $a->paginate(3);
        
        $page = $list->render();
        if(request()->isAjax()){
            $list = $list->toArray();
            $list['page']=$page;
            echo json_encode($list);die;
        }
        $this->assign("list",$list);
        $this->assign("page",$page);
        return $this->fetch();
   }
   public function del()
   {
        $a=new model;
        $id=input('param.id');
        $del=\Db::name('kaoshi')->delete($id);
        
        $list= $a->paginate(3);
        
        $page = $list->render();
        if(request()->isAjax()){
            $list = $list->toArray();
            $list['page']=$page;
            echo json_encode($list);die;
        }
        
   }
}
