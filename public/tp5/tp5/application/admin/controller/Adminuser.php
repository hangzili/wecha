<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Index_user as model;
class Adminuser extends Base
{
    public function list()
    {
        $list=model::select();
        // dump($list);
        $this->assign('list',$list);
        return view();
    }
    public function update()
    {
        $is_member=input("get.is_member");
        $id=input("get.id");
        $info=\Db::name('Index_user')->where('id',$id)->update(['is_member'=>$is_member]);
        // $date=input('get.');
        // $model= new model;
        // $info=$model->update($date);
        dump($info);
    }
}
