<?php

namespace app\kaoshi\controller;

use think\Controller;
use think\Request;
use app\kaoshi\model\Student;
class Stud extends Controller
{
    public function add()
    {
    	$a=new Student;
    	$lito= db()->name('class')->select();
    	$this->assign('lito',$lito);
    	return $this->fetch();
    }
    public function add_do()
    {
    	$date=input('param.');
    	// var_dump($date);
    	$a=new Student;
    	$list=$a->save($date);
    	// var_dump($list);
    	if($list){
    		$this->success('添加成功','list');
    	}
    }
    public function list()
    {
    	$lito= db()->name('class')->select();
    	$this->assign('lito',$lito);


    	$where=[];
    	if(input('?get.soua')){
    		$where=['s_name','like','%'.input('get.soua').'%'];
    	}
    	if(input('?get.soub')){
    		$where=['classa','=',input('get.soub')];
    	}
    	// var_dump($where);

    	$a=new Student;

    	// $list=$a->join('class','student.classa=class.cid')->paginate(3);
    	$list=$a->join('class','student.classa=class.cid')->all();
    	$this->assign('list',$list);
    	return $this->fetch();
    	// var_dump($list);
    }
    public function del()
    {
    	$id=input('param.id');
    	$del=db()->name('student')->delete($id);
    	if($del){
    		$this->success('删除成功','list');
    	}
    }
    public function upd()
    {
    	$lito= db()->name('class')->select();
    	$this->assign('lito',$lito);
    	$a=new Student;
    	$id=input('param.id');
    	$upd= $a -> find($id);
    	// var_dump($upd);
    	$this->assign('upd',$upd);
    	return $this->fetch();
    }
    public function upd_do()
    {
    	$id=input('param.id');
    	$date=input('param.');
    	$a=new Student;
    	$total=$a->save($date,['id'=>$id]);
    	// var_dump($total);
    	if($total){
    		$this->success('修改成功','list');
    	}
    }
}
