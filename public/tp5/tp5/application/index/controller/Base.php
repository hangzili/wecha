<?php

namespace app\index\controller;
use  think\facade\Session;
use think\Controller;
use think\Request;
use app\index\model\Cat;
use app\index\model\Car;

class Base extends Controller
{
    public function __construct(){
        
        parent::__construct();
        $top_nam=Cat::where('parent_id','0')->select();
            // dump($top_nam);
        $this->assign('top_nam',$top_nam);
            //查询分类表里的所有
        $data=\Db::name("cat")->all();
            //调用common里的应用公共文件
        $catData=createTreeBySon($data);
        $this->assign("cat",$catData);
            //获取当前的控制器
        $controller=\Request::controller();
            //获取当前的方法名
        $action=\Request::action();

        $this->assign('controller',$controller);
        $this->assign('action',$action);
        // echo $controller;
        // echo $action
         //购物车显示
        if($this->checkLogin()){
            //登陆
            $user_id=session('indexsession')['id'];
            $carlist=Car::where(['user_id'=>$user_id])->select();
            $count=count($carlist);
        }else{
            //未登陆
            $carlist=json_decode(cookie('car'),true)?:[];
            $count=count($carlist);
        }
        $this->assign('carlist',$carlist);
        // dump($carlist);
        $this->assign('counta',$count);

    }
    public function carrr()
    {
        //购物车显示
        if($this->checkLogin()){
            //登陆
            $user_id=session('indexsession')['id'];
            $carlist=Car::where(['user_id'=>$user_id])->select();
            $count=count($carlist);
        }else{
            //未登陆
            $carlist=json_decode(cookie('car'),true)?:[];
            $count=count($carlist);
        }
        return $carlist;
        return json_decode($count);
        // $this->assign('carlist',$carlist);
        // dump($carlist);
        // $this->assign('counta',$count);
    }
    //通过session判断是否登陆
    public function checkLogin()
    {
        $user=Session::get('indexsession');
        // dump($user);
        if($user){
            return true;
        }else{
            return false;
        }
    }
}
