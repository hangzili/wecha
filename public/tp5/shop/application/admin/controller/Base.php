<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
   public function __construct()
   {
    //    子类中调用父类构造方法
    parent::__construct();
    if(!session("?info")){
        $this->error('你先登录',url('Login/login'));exit;
    }
    // 所有控制器都要继承这个控制器  除了login 和自己
   }
}
