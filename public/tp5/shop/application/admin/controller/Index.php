<?php
namespace app\admin\controller;
use think\Controller;
class Index extends Base
{
    

    public function create()
    {
       
        return $this->fetch();
    }
    public function index()
    {
        // echo session('info.admin_name');exit;
        
        return $this->fetch();
    }
    
}
