<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Yuan extends Controller
{
   public function add()
   {
       $z=\Db::name('zhi')->all();
       $this->assign('z',$z);
       $b=\Db::name('bu')->all();
       $this->assign('b',$b);
       return $this->fetch();
   }
   public function add_do()
   {
       $data=input('param.');
       $into=\Db::name('yuan')->insert($data);
    //    if($into){
    //        $this->success("添加成功","list");
    //    }
    if($into){
        $return = ['rea'=>0,'mag'=>'添加成功'];
    }else{
        $return = ['rea'=>0,'mag'=>'添加失败'];
    }
    echo json_encode($return);
   }
   public function list()
   {
        $where=[];
        $y_name=input('get.y_name');
        if(!empty($y_name)){
            $where[]=['y_name','like',"%$y_name%"];
        }
        $y_tel=input('get.y_tel');
        if(!empty($y_tel)){
            $where[]=['y_tel','like',"%$y_tel%"];
        }
        $z_id=input('get.z_id');
        if(!empty($z_id)){
            $where[]=['yuan.z_id',"=","$z_id"];
        }
        $y_is=input('get.y_is');
        if(!empty($z_id)){
            $where[]=['yuan.y_is',"=","$y_is"];
        }
        // dump($where);
       $list=\Db::name('yuan')->where($where)
            ->join('zhi','yuan.z_id=zhi.z_id')
            ->join('bu','bu.b_id=yuan.b_id')
            ->all();
        if(request()->isAjax()){
            // $list=$list->toArray();
            // $list['page']=$page;
            echo json_encode($list);die;
        }
       $this->assign('list',$list);
       return $this->fetch();
   }
   public function upd()
   {
       $data=input('get.');
       $upd=\Db::name('yuan')->update($data);
       var_dump($upd);
   }
   public function del()
    {
        $arr=input('param.');
        $arrr=array_pop($arr);
        $dell=\Db::table('yuan')->delete($arrr);
        var_dump($dell);
    }
}
