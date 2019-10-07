<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Admin extends Controller
{
  public function __construct(){
    parent::__construct();
    if(!session('?username')){
      $this->redirect('Login/index');
    }
  }
   public function admin_add()
   {
        // var_dump(session('username'));
        return $this->fetch();
   }
   public function add_do()
   {
        $date['username']=input('post.username','123');
        $date['userpwd']=input('post.user.userpwd','321');
        $date['usersalt']='123456';
        $date['create_time']= time();
        $date['update_time']= time();
        // var_dump($date);
        $static= db()->name('admin')->insert($date);
        // var_dump($static);
        if($static){
          $this->success('添加成功','admin_list');
        }else{
          $this->success('添加失败');
        }
   }
   public function admin_list()
   {
        // $this->view->engine->layout(false);
        $list= \Db()->name('admin')->paginate(3);
        $page=$list->render();
        if(request()->isAjax()){
          $list=$list->toArray();
          $list['page']=$page;
          echo json_encode($list);die;
        }
        $this->assign('list',$list);
        return $this->fetch();
   }
   public function del()
   {
        $id=input('param.id',1);
        $del= db()->name('admin')->delete($id);
        return $del;
        if($del){
          $this->success('删除成功','admin_list');
        }else{
          $this->seccess('删除失败');
        }

   }
   public function upd()
   {
        $id=input('param.id',1);
        $info= db()->name('admin')->where('id',$id)->find();
        $this->assign('info',$info);
        return $this->fetch();
        // var_dump($info);

   }
   public function upd_do()
   {
        $date['username']=input('param.username','000');
        $date['userpwd']=input('post.userpwd','000');
        $id=input('param.id','1');
              // var_dump($date);
              // var_dump($id);
        $upd= db()->name('admin')->where('id',$id)->update($date);
                // var_dump($upd);
        if($upd){
          $this->success('修改成功','admin_list');
        }else{
          $this->success('修改失败');
        }
   }
}
