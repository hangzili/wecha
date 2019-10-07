<?php

namespace app\test\controller;

use think\Controller;
use think\Request;
use app\test\validate\Us;
use app\test\model\Usera;
class User extends Controller
{
    public function add()
    {
        return $this->fetch();
    }
    public function add_do()
    {
        $a=new Usera;
        $date=input('param.');
        $u=new Us;
        if(!$u->check($date))
        {
            $this->error( $u->getError() );
        }
        $file=request()->file('image');
        $info = $file->move('./uploads');
        if($info){
            $date['image']='/uploads/'.$info->getSaveName();
        }else{
            echo $file->getError();
        }
        $do=$a->save($date);
        if($do){
            $this->success('添加成功','list');
        }
    }
    public function list()
    {
        $a=new Usera;
        $list=$a->paginate(3);
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function del()
    {
        $id=input('param.id');
        $a=new Usera;
        $del=$a->destroy($id);
        if($del){
            $this->success('删除成功','list');
        }else{
            $this->error('删除失败');
        }
    }
}
