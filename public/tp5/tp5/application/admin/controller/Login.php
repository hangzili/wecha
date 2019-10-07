<?php

namespace app\admin\controller;
use think\facade\Cookie;
use think\Controller;
use think\Request;
use think\captcha\Captcha;    //引用验证码
use think\facade\Session;
class Login extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return $this->fetch("index/Login");
    }
    /**
     * 登陆页面
     * @return [type] [description]
     */
    public function login()
    {
        $this->view->engine->layout(false);
        $adminInfo=Cookie::get('adminInfo');
        //七天免登陆，将cookie储存到session从而不用登陆
        if($adminInfo){
            //将字符串转化成数组
            // $adminInfo=json_decode($adminInfo,true);
            //将cookie储存到session里面
            Session::set('username',$adminInfo);
            $this->redirect('index/index');
        }
        return $this->fetch();
    }
    /**
     * 验证码
     * @return [type] [description]
     */
    public function verify()
    {
        $config = [
            // 验证码字体大小
            'fontSize' => 30,
            // 验证码位数
            'length' => 4,
            // 关闭验证码杂点
            'useNoise' => false,
            //验证码格式
            'codeSet' => '1234567890',
            ];

        $captcha = new Captcha($config);
        return $captcha->entry();
    }
    public function logindo()
    {
        $date=input("param.");
        $password=$date['password'];
        $username=$date['username'];
        $remember=input("post.remember");
        $value=$date['captcha'];    //-------------验证验证码
        $dar=\Db::name('admin_user')->where("username",$username)->find();
        //判断验证码对不对
        // if( !captcha_check($value ))
        // {
        //     $this->error('验证码不对');die();
        // }
        //用户名不对，不能登陆
        if(!$dar){
            $this->error('同户名不对');die;
        }
        //密码不对不能登陆
        if($dar['password']!=$password){
            $this->error('密码不对');die;
        }
        //密码重置后为000000   重置后不能登陆
        if($dar['password']==000000){
            $this->error('报废');
        }
        //如果点击记住密码   设置cookie 七天内不用登陆直接进入
         if($remember==1){
            Cookie::set('adminInfo',$date,60*60*24*3);
        }
        //设置session 防止非法登陆
        session('username',$dar);
        $this->success('登陆成功','index/index');
    }
    //退出登陆
    public function tui()
    {
        session(null);
        Cookie::delete('adminInfo');
        $this->redirect('Login/login'); 
    }

}
