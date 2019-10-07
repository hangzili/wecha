<?php

namespace app\test\controller;

use think\Controller;
use think\Request;
use app\test\model\News as Newa;
class News extends Controller
{
   public function add()
   {
        $this->view->engine->layout(false);
        return $this->fetch();
   }
   public function add_do()
   {
        $this->view->engine->layout(false);
        $date=input("param.");
        $a=new Newa;
        // $date['create_time']=time();
        // $info=\Db::name("News")->insert($date);
        $info=$a->save($date);
        if($info){
            $this->success("添加成功",'list');
        }
   }
   public function list()
   {
        $this->view->engine->layout(false);



        $a=new Newa;
        $nname=input("param.nname");
        $where=[];
        if(!empty($nname)){
            $where[]=["nname","like","%$nname%"];
        }

        $list=$a->where($where)->paginate(10);
        $page=$list->render();
        if(request()->isAjax()){
            $list=$list->toArray();
            $list['page']=$page;
            echo json_encode($list);die;
        }

        $this->assign('list',$list);
        return $this->fetch();
   }
}
