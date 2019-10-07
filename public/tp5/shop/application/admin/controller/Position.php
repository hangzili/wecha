<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Position extends Controller
{
    public function create()
    {
        $a_id=input('get.id');
        $this->assign('a_id',$a_id);
        return view();
    }
    public function createdo()
    {
        $data = input('post.');
        // 验证非空唯一  价格纯数字和小数点



        // 获取图品信息
        $file = request()->file('position_img');
        $info = $file->move( './position_img');
        if(empty($info)){
            $this->error($file->getError());exit;
            //  echo $file->getError();exit;没有文件上传不能报错，要提示上面那句
        }
       $data['position_img'] ='/position_img/'.$info->getSaveName();
       $position_model=model("Position");
       $res=$position_model->save($data);
       if($res){
            $this->success('添加成功',url('Position/index'));
        }else{
            $this->error('添加失败');
        }
    }
}
