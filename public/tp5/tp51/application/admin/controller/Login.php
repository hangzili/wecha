<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\controller\admin;
class Login extends Controller
{
    public function index()
    {
        $this->view->engine->layout(false);
        return $this->fetch();
    }
    public function index_do()
    {
        $date=input('param.');
        $dar=Db()->name('admin')->where('username',$date['username'])->find();
        // if(!captcha_check($date['code']))
        // {
        //     $this->error('验证码不对');die;
        // }
        if($dar){
            if($dar['userpwd']==$date['userpwd']){
                session('username',$date['username']); 
                $this->success('登陆成功','admin/admin_add');
            }else{
                $this->error('密码不对');
            }
        }else{
            $this->error('账号不对');
        }
    }
    public function tui()
    {
        session(null);
        $this->redirect('Login/index'); 
    }

}
