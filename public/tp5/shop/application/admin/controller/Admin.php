<?php

namespace app\admin\controller;

use think\Controller;

class Admin extends Base
{
    public function admin_add()
    {
        return $this->fetch();
    }
    public function add_do()
    {
        $data = input('post.');
        $data['is_show'] = 0;
        $data['add_time'] = time();//时间

        $Amodel = model('Admin');        
        $info=$Amodel->where('admin_name',$data['admin_name'])->count();
        //用户名
        
        if(empty($data['admin_name'])){
            errorly('管理员名称不能为空');
        }
        if($info==1){
            errorly('已有名称，重新更换');
         }
         $aname= '/^([a-z0-9]{4,12})$/';
         if(!preg_match($aname,$data['admin_name'])){
            errorly('用户名a-z0-9的4-12位英文数字');
        }
        //密码
        $pwd='/^([a-z0-9]{4,12})$/';
        if(empty($data['admin_pwd'])){
            errorly('密码不能为空');
        }
        if(!preg_match($pwd,$data['admin_pwd'])){
            errorly('密码a-z0-9的4-12位英文数字');
        }
        //手机
        $tel='/^1[34578]\d{9}$/';
        if(empty($data['admin_tel'])){
            errorly('手机不能为空');
        }
        if(!preg_match($tel,$data['admin_tel'])){
            errorly('请输入13.15.14.17.18的11位手机号！');
        }
       
        //邮箱
        $ema= '/^[a-z]\w{6,18}@\d{3,5}(\.)|com|cn|net$/';
        if(empty($data['admin_email'])){
            errorly('邮箱不能为空');
        }
        if(!preg_match($ema,$data['admin_email'])){
            errorly('英文数字6-18位混合，含@com.cn.net格式的邮箱！');
        }
        

        $Amodel = model('Admin');
        $res = $Amodel->save($data);
        if($res){
            successly('添加成功');
        }else{
            errorly('添加失败');
        }
    	
    }
    public function admin_list()
    {
        // 接收搜索条件 
        $query = input('get.');
        // print_r($query);
        $where = [];
        if(!empty($query['admin_name'])){
            $where[] = ['admin_name','like',"%".$query['admin_name']."%"];
        }
        $Amodel = model('Admin');
        $list = $Amodel
        ->where($where)
        ->paginate(3,false,['query'=>$query]);//分页搜索
        $this->assign('list',$list);
        $this->assign('query',$query);
    	return $this->fetch();
    }
    public function delete()
    {
        $id = input('get.admin_id');
        // echo $id;
        $where=[
            ['admin_id','in',$id],
        ];
         $Amodel = model('Admin');
         $res = $Amodel->where($where)->delete();
         if($res){
            $this->success('删除成功',url('Admin/admin_list'));
        }else{
            $this->error('删除失败',url('Admin/admin_list'));
        }
    }
    
    public function edit()
    {
        $admin_id = input('get.admin_id');
        // 项目入库不能用Db类,要用模型
        $Amodel=model('Admin');//另一种引入模型的方法
        $upda=$Amodel->where('admin_id',$admin_id)->find();
        $this->assign('list',$upda);
        return $this->fetch();
    }
    public function update()
    {
        $data = input('post.');
        // 项目入库不能用Db类,要用模型   
        // var_dump($data);exit;
        $Amodel=model('Admin');
        $info=$Amodel->where('admin_name',$data['admin_name'])->count();
        // dump($info);exit();
        if(empty($data['admin_name'])){
            $this->error('修改管理名称不能为空',url('Admin/edit'));exit();
        } 
        if($info==1){
            $this->error('管理员名已存在，修改重新取名',url('Admin/edit'));
        }

        $res = $Amodel->save($data,["admin_id"=>$data['admin_id']]);
        if($res){
            $this->success('修改成功',url('Admin/admin_list'));
        }else{
            $this->error('修改失败',url('Brand/edit'));
        }
    }
}
