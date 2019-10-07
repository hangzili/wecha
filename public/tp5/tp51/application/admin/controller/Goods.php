<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Goods extends Controller
{
    public function add()
    {
        return $this->fetch();
    }
    public function add_do()
    {
        $data=input('post.');
        // $data['img'];
        $file = request()->file('img');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move( './uploads');
        if($info){
        $data['img']='/uploads/'. $info->getSaveName();
        }else{
        // 上传失败获取错误信息
        echo $file->getError();
        }
        $into=\Db::name('goods')->insert($data);
        if($into){
            $this->success("添加成功",'list');
        }
    }
    public function list()
    {
        $list=\Db::name('goods')->paginate(3);
        $page = $list->render();
        if(request()->isAjax()){
            $list = $list->toArray();
            $list['page']=$page;
            echo json_encode($list);die;
        }
        $this->assign('page',$page);
        $this->assign("list",$list);
        return $this->fetch();
    }
    public function upd()
    {
        $data=input("param.");
        $upda=\Db::name('goods')->update($data);
        var_dump($upda);
    }
}
