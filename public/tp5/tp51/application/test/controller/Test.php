<?php

namespace app\test\controller;

use think\Controller;
use think\Request;

class Test extends Controller
{
   
    public function index()
    {
        $this->view->engine->layout(false);
        $username=input('get.username');
        // var_dump($username);
        $where=[];
        if(!empty($username)){
            $where[]=['t_man','like',"%$username%"];
        }
        $list= \db()->name('tt')->where($where)->paginate(4);
        $page=$list->render();

        if(request()->isAjax()){
            $list=$list->toArray();
            $list['page']=$page;
            echo json_encode($list);die;
        }
        $this->assign('list',$list); 
        $this->assign('page',$page);
        $this->assign('username',$username);
        return $this->fetch();
    }
    public function del()
    {
        $id=input("param.id");
        $del=\Db::name('tt')->delete($id);
        if($del){
            echo 1;
        }else{
            echo 2;
        }
    }

   
}
