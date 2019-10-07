<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Address as model;
use app\index\model\User_address;
class Address extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $user_id=session('indexsession')['id'];
        $user_address=User_address::where('user_id',$user_id)->all();

        $list=model::where(['parent_id'=>'0'])->select();
        // dump($list);
        $this->assign('list',$list);
        $this->assign('user_address',$user_address);
        return $this->fetch();
    }
    public function getsonAddress()
    {
        $region_id=input('post.region_id');
        $sonlist=model::where(['parent_id'=>$region_id])->all();
        echo json_encode($sonlist);
        // $this->assign('sonlist',$sonlist);
        // dump($sonlist);
    }

}
