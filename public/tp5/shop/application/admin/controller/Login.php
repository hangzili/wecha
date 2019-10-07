<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\captcha\Captcha;

class Login extends Controller
{
    public function login()
    {
        $this->view->engine->layout(false);//临时关闭layout
        return $this->fetch();
    }
    public function login_do()
    {
        $admin_name=input('post.admin_name');
        $admin_pwd=input('post.admin_pwd');
         $mycode=input('post.mycode');
        // 要先验证验证码在做  验证账号
        // $res = captcha_check($mycode);
        // var_dump($res);这里就能实验验证码正确不正确

        if(!captcha_check($mycode)){
            errorly('验证码错误');exit;
        }

        // 验证账号密码
        $where[]=[
            'admin_name','=',$admin_name
        ];
        $amodel=model('Admin');
        $adminInfo = $amodel->where($where)->find();
        // dump($adminInfo);             
            if(!empty($adminInfo)){
                if($adminInfo['admin_pwd']==md5($admin_pwd)){
                    $info=['admin_id'=>$adminInfo['admin_id'],'admin_name'=>$adminInfo['admin_name']];//准备session
                            // session_start();//原生的开启session
                            // $_SESSION['info']=$info; 
                            session('info',$info);//tp5的session开启方法


                    successly('欢迎登陆');
                }else{
                    errorly('密码有误');//只能if套if判断，否则根本无法往下执行代码
                }
            }else{
                errorly('账号有误');
            }
    }

    /*
   验证码处理
   */
  public function verify()
  {
     $config = [
        // 验证码字体大小
        'fontSize' => 50,
        // 验证码位数
        'length' => 4,
        // 关闭验证码杂点
        'useNoise' => false,
        //格式
        'codeSet' => '0123456789',
        
    ];

    $mycode = new Captcha($config);
    return $mycode->entry();  

  }

    /** 退出 session跳转登录页面*/
    public function quit()
    {
        session('info',null);
        $this->error('退出...',url('Login/login'));
        // 到这里就差网址当中知道地址进去后台，准备非法登陆了
    }

    // public function test()
    // {
    //     dump(session('info'));//检查session有没有存储
    // }

    
}
