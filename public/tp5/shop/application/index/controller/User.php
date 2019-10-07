<?php
namespace app\index\controller;
use think\Controller;

class User extends Common
{
    //显示个人中心
    public function index()
    {
        return $this->fetch();
    }
    public function image()
    {
    	// $position_model=model("Position");
    	// $list=$position_model->all();

    	// foreach ($list as $k => $v) {
    	// 	// $add_time=$v['add_time'];
    	// 	if
    	// }
    	// // $add_time=$list['add_time'];
    	// dump($add_time);	
    	
    }

    
}
