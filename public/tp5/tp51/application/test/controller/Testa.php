<?php

namespace app\test\controller;

use think\Controller;
use think\Request;

class Testa extends Controller
{
   public function add()
   {
        $this->view->engine->layout(false);
        return $this->fetch();
   }
   public function add_do()
   {
        $date=input("param.");
        // var_dump($date);
        $info=\Db::name("Testa")->insert($date);
        if($info){
            $this->success("添加成功",'list');
        }
   }
   public function list()
   {
         $this->view->engine->layout(false);
         $username=input("get.username");
         $where=[];
         if(!empty($username)){
            $where[]=['sname','like',"%$username%"];
         }

        $list=\Db::name('Testa')->where($where)->paginate(10);
        $page=$list->render();
        if(request()->isAjax()){
            $list=$list->toArray();
            $list['page']=$page;
            echo json_encode($list);die;
        }
        
        $this->assign('page',$page);
        $this->assign('list',$list);
        $this->assign('username',$username);
        return $this->fetch();
   }
   public function del()
   {
        $id=input("param.id");
        $del=\Db::name("Testa")->delete($id);
        if($del){
            echo '1';die();
        }else{
            echo '0';die;
        }
   }
   public function upd()
   {
        $this->view->engine->layout(false);
        $id=input("param.id");
        $info= \Db::name("Testa")->find($id);
        $this->assign("info",$info);
        return $this->fetch();
   }
   public function upd_do()
   {
        $sid=input("param.sid");
        $date=input("param.");
        $info=\Db::name("Testa")->where('sid',$sid)->update($date);
        if($info){
          echo "1";
        }
   }
}
