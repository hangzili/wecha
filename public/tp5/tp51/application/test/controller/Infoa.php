<?php

namespace app\test\controller;
use app\test\validate\Infos;
use think\Controller;
use think\Request;
use app\test\model\Info;
class Infoa extends Controller
{
    public function add()
    {   
        $list=Db()->name('area')->select();
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function add_do()
    {
        $a=new Info;
        $date=input('param.');
         $u=new Infos;
        if(!$u->check($date))
        {
            $this->error( $u->getError() );
        }
        $info=$a->save($date);
        // var_dump($info);
        if($info){
            $this->success('添加成功','list');
        }else{
            $this->error('添加失败');
        }
    }
    public function list()
    {
        $a=new Info;
        $list=$a->join('area','area.aid=info.aid')->paginate(10);
        // var_dump($list);
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function del()
    {
        $id=input('param.id');
        $a=new Info;
        $del=$a->destroy($id);
        if($del){
            $this->success('删除成功','list');
        }
    }
    public function upd()
    {
        $id=input('param.id');
        $a=new Info;
        $tade=$a->find($id);
        // var_dump($tade);
        $this->assign('tade',$tade);
        return $this->fetch();
    }
    public function upd_do()
    {
        $id=input('param.id');
        $date=input('param.');
        $a=new Info;
        $upd=$a->save($date,['id'=>$id]);
        // var_dump($upd);
        if($upd){
            $this->success('修改成功','list');
        }
    }
}
