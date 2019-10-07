<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Students as model;
class Students extends Controller
{
   public function add()
   {
        return $this->fetch();
   }
   public function add_do()
   {
        $data=input('post.');
        $a=new model;
        $ab=$a->save($data);
        // dump($ab);
        if($ab){
            $return = ['ret'=>1,'asd'=>'添加成功'];
        }else{
            $return =['ret'=>0,'asd'=>'失败'];
        }
        echo json_encode($return);
   }
   //展示页面
   public function list()
   {
        //搜索
        $names=input('get.names');
        $where=[];
        if(!empty($names)){
            $where[]=['names','like',"%$names%"];
        }
        $a=new model;
        $list= $a->where($where)->paginate(3);
        //分页
        $page=$list->render();
        if(request()->isAjax()){
            $list=$list->toArray();
            $list['page']=$page;
            echo json_encode($list);die;
        }
        $this->assign('names',$names);
        $this->assign('page',$page);
        $this->assign('list',$list);
        return $this->fetch();
   }
    public function del()
    {
        $arr=input('param.');
        dump($arr);
        // $arrr=array_pop($arr);
        // $a=new model;
        // $dell=$a->delete($arrr);
        // var_dump($dell);
    }
   public function upda()
   {
        $data=input('param.');
        $a=new model;
        $upd=$a->update($data);
        var_dump($upd);
   }
}