<?php

namespace app\admin\controller;
use app\admin\controller\Base;
use think\Controller;
use think\Request;
use think\facade\Session;
class Index extends Base
{
    
    /**
     * 展示
     *
     * @return \think\Response
     */
    public function index()
    {
        return $this->fetch();
    }
    public function top()
    {
        return $this->fetch();
    }
    public function main()
    {
        return $this->fetch();
    }
    public function menu()
    {
        return $this->fetch();
    }
    public function drag()
    {
        return $this->fetch();
    }

   
}
