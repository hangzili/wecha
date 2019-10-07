<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Address as model;
use app\index\model\Area;
class Address extends Common
{
    //显示页面
    public function index()
    {
    	$user_id=session('userData.user_id');
    	$address=model::where('user_id',$user_id)->all();
    	foreach ($address as $k=>$v) {
          $address[$k]['province']=Area::getaddarea($v['province']);
          $address[$k]['city']=Area::getaddarea($v['city']);
          $address[$k]['district']=Area::getaddarea($v['district']);
      	}
      	$top=model('Area')->where('pid',0)->select();
      	$this->assign('top',$top);
      	// dump($address);exit;
    	$this->assign('address',$address);
        return $this->fetch();//显示前台视图
    }
    //设为默认地址
    public function setdefault()
    {
    	$id=input('post.address_id');
    	$user_id=session('userData.user_id');
    	$all=model::where('user_id',$user_id)->update(['is_default'=>0]);
    	$where=[
    		['user_id','=',$user_id],
    		['address_id','=',$id]
    	];
    	$upda=model::where($where)->update(['is_default'=>1]);
    }
    //添加
    public function addrestwo()
    {
      $post=input('post.');
      $user_id=session('userData.user_id');
        $post['user_id']=$user_id;
        // $refer=$post['refer'];
        $res=model::create($post);
        $this->error('添加成功');
        // dump($refer);
        // if($res){
        //   $this->redirect($post['refer']);
        // }
    }
    //删除
    public function del()
    {
        $id=input('post.address_id');
        $user_id=session('userData.user_id');
        $where=[
            ['address_id','=',$id],
            ['user_id','=',$user_id]
        ];
        $del=model::where($where)->delete();
    }

    
}
