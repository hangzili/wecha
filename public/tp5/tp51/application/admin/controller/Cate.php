<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Category;
class Cate extends Controller
{
    public function __construct(){
    parent::__construct();
        if(!session('?username')){
          $this->redirect('Login/login');
        }
    }
    public function add()
    {
      return  $this->fetch();
    }
    public function add_do()
    {
        $date=input('post.');
        // var_dump($date);
        // $date['create_time']= time();
        // $date['update_time']= time();
        $a= new Category;
        $info=$a->save($date);
        // $info= db()->name('category')->insert($date);
        if($del){
          $this->success('添加成功','Cate_list');
        }else{
          $this->seccess('添加失败');
        }
    }
    public function Cate_list()
    {
        $a= new Category;
        $list=$a->all();
        $this->assign('list',$list);
        // var_dump($list);
       return $this->fetch();
    }
    public function del()
    {
        $id=input('param.id');
        // var_dump($id);
        $a=new Category;
        $del=$a->destroy($id);
        if($del){
          $this->success('删除成功','Cate_list');
        }else{
          $this->seccess('删除失败');
        }
    }
    public function upd()
    {
        $id=input('param.id');
        // var_dump($id);
        $a=new Category;
        $info=$a->get($id);
        //var_dump($info);
        $this->assign('info',$info);
        return $this->fetch();
    }
    public function upd_do()
    {
        $date=input('param.');
        // $id=input('post.id');
        // var_dump($date);
        $a=new Category;
        $status=$a->save($date,['id=>$id']);
        if($del){
          $this->success('修改成功','Cate_list');
        }else{
          $this->seccess('修改失败');
        }
    }
}
