<?php

namespace app\test\controller;
use app\test\validate\Ba;
use think\Controller;
use think\Request;
use app\test\model\Baks;
class Bak extends Controller
{
    public function add()
    {
        return $this->fetch();
    }
    public function add_do()
    {
        $a=new Baks;
        $date=input('param.');
        $ba=new Ba;
        if(!$ba->check($date))
        {
            $this->error( $ba->getError() );
        }

        $file = request()->file('image');
        $info = $file->move('./uploads');
        if($info){
              $date['image']='/uploads/'.$info->getSaveName();
                }else{       
                 echo $file->getError();        
             } 
        $tae=$a->save($date);
       if($tae){
            $this->success('添加成功','list');
       }else{
            $this->error('添加失败');
       }
    }
    public function list()
    {
        $a=new Baks;
        $list=$a->all();
        // var_dump($list);
        $this->assign('list',$list);
        return $this->fetch();
    }
}
