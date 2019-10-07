<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Notice extends Controller
{
    public function create()
    {
        return $this->fetch();
    }

    public function add_do()
    {
        $data = input('post.');
        // dump($data);exit;
        $data['add_time'] = date("Y-m-d H:i:s");
        if($data['n_show']==1){
            $data['send_time']=time();//如果 为是，则为当前时间
        }else{
            $data['send_time']=strtotime($data['send_time']);
            //time()获取当前时间戳  date(Y-m-d H:i:s,time());把时间戳转为日期  // strtotime把日期转为数据库时间戳
            if($data['send_time']<=time()){
                errorly('发布时间不能小于当前时间');exit;
            }
        }
        // exit;
        $nmodel = model('Notices');
        $res = $nmodel->save($data);
        if($res){
            successly('添加成功');
        }else{
            errorly('添加失败');
        }
    }
    public function index()
    {
        $nmodel = model('Notices');
        $info = $nmodel->select();
        $this->assign('info',$info);
        return $this->fetch();
    }
}
