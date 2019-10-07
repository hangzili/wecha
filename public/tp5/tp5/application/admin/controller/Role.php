<?php

namespace app\admin\controller;
use app\admin\controller\Base;
use think\Controller;
use think\Request;
use app\admin\model\Role as model;
use app\admin\validate\Role as validat;
class Role extends Base
{
   public  function add()
   {
        return $this->fetch();
   }
   public function add_do()
   {
        $data=input('param.');
        //验证唯一性
        $validate = new validat;
        if (!$validate->check($data)) {
            dump($validate->getError());die;
        }


        $a=new model;
        // $inone=$a->where('r_name',$data['r_name'])->all();
        // if($inone){
        //     $this->error('名称重复');
        // }
        $into=$a->insert($data);
        if($into){
            $this->success("添加成功","list");
        }
   }
   public function list()
   {
        $list=model::paginate(3);

        $page = $list->render();
        if(request()->isAjax()){
            $list = $list->toArray();
            $list['page']=$page;
            echo json_encode($list);die;
        }
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->fetch();
   }
   public function del()
   {
        $id=input('param.id');
        $del=model::destroy($id);
        if($del){
            $this->success("删除成功","list");
        }
   }
   public function upd()
   {
        $id=input('param.id');
        $one=model::find($id);
        $this->assign('one',$one);
        return $this->fetch();
   }
    public function upd_do()
    {
        $upda=input('param.');
        //验证唯一性
        $validate = new validat;
        if (!$validate->check($upda)) {
            dump($validate->getError());die;
        }
        
        $upd=model::update($upda);
        if($upd){
            $this->success("修改成功","list");
        }
    }
    public function  one()
    {
        $r_name=input('param.');
            // dump($r_name);
        $r_name=implode($r_name);
        $where[]=['r_name','=',$r_name];
            // dump($r_name);
        $onee=model::where($where)->all();
        echo json_encode($onee);
            // if(!empty($onee)){
            //     echo json_encode('重复');
            // }
    }
}
