<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\News;
use app\admin\model\Articlesa;
use app\admin\validate\Articlesa as ab;
class Articles extends Controller
{
   public function __construct(){
    parent::__construct();
    if(!session('?username')){
      $this->redirect('Login/index');
    }
  }
  public function add()
  {
        $a=new News;
        $list=$a->all();
        // var_dump($list);
        $this->assign('list',$list);
        return $this->fetch();
  }
  public function add_do()
  {
        $date=input('post.');
        $file= request()->file('image');
        $info=$file->move('./uploads');
       if($info){
                $date['image']='/uploads/'.$info->getSaveName();
        }else {
             echo $file->getError();
        }
        $ab=new ab;
        if(!$ab->check($date))
        {
            $this->error( $ab->getError() );
        }
        
        $a= new Articlesa;
        $date= $a->save($date);
        // var_duMP($date);
        if($date){
            $this->success('添加成功','list');
        }else{
            $this->error('添加失败');
        }
  }
  public function list()
  {
        $a=new Articlesa;
        // $list=$a->all();
        $list=$a->join('tp_news','tp_articlesa.cid=tp_news.cid')->all();
        // var_dump($list);
        $this->assign('list',$list);
        return $this->fetch();
  }
  public function del()
  {
        $id=input('param.id');
        $a=new Articlesa;
        $del=$a->destroy($id);
        if($del){
            $this->success('删除成功','list');
        }else{
            $this->error('删除失败');
        }
  }
}
