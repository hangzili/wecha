<?php

namespace app\admin\controller;
use app\admin\controller\Base;
use think\Controller;
use think\Request;
use app\admin\model\Admin_user;    //模型
class Admin extends Base
{
    /**
     * 添加页面
     *
     * @return \think\Response
     */
    public function add()
    {
       return $this->fetch();
    }
    /**
     * 添加执行页面
     */
    public function add_do()
    {
        $date=input('param.');
        if(empty($date['username'])){
            $this->error('管理员姓名不能为空');
        }
        $a=new Admin_user;
        // $date['create_time']=time();
        $info=$a->save($date);
        if($info){
            $this->success('添加成功','list');
        }
    }
    /**
     * 管理员列表展示页面
     */
    public function list()
    {
        $da=session('username');
        // dump($da);
        if($da['state']!=1){
            $this->error('停');
        }
        $a=new Admin_user;
        $list=$a->order("create_time","desc")->paginate(2);

        $page = $list->render();
        if(request()->isAjax()){
            $list = $list->toArray();
            $list['page']=$page;
            echo json_encode($list);die;
        }
        $this->assign('list',$list);
        $this->assign("list",$list);
        return $this->fetch();
    }

            


    /**
     * 状态修改
     */
   public function upda()
   {
        $data=input("param.");
        $c=new Admin_user;
        $info=$c->update($data);
        // var_dump($info);
   }

}
