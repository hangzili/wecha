<?php

namespace app\test\controller;

use think\Controller;
use think\Request;

class Testb extends Controller
{
   public function add()
   {
        $this->view->engine->layout(false);
        return $this->fetch();
   }
   public function add_do()
   {
        $date=input("param.");
        $info=\Db::name("testb")->insert($date);
        if($info){
            $this->success("添加成功",'list');
        }
   }
   public function list()
   {
        $this->view->engine->layout(false);
        $sname=input("param.sname");
        $where=[];
        if(!empty($sname)){
            $where[]=['sname','like',"%$sname%"];
        }
        $list=\Db::name("testb")->where($where)->paginate(3);

        $page=$list->render();
        if(request()->isAjax()){
            $list=$list->toArray();
            $list['page']=$page;
            echo json_encode($list);die;
        }

        $this->assign("list",$list);
        return $this->fetch();
   }
}
