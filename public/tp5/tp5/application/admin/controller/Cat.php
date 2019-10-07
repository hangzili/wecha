<?php

namespace app\admin\controller;
use app\admin\controller\Base;
use think\Controller;
use think\Request;
use app\admin\model\Cat as catmodel;
class Cat extends Base
{
    /**
     * 添加页面
     *
     * @return \think\Response
     */
    public function add()
    {
        $a=new catmodel;
        $list=$a->all();
        $list=createTree($list);
        $this->assign('list',$list);

        return $this->fetch();
    }


    /**
     * 添加执行页面
     *
     * @return \think\Response
     */
    public function add_do()
    {
        $data=input('post.');
        if(empty($data['cat_name'])){
            $this->error('分类名称不能位空');
        }
        $a=new catmodel;
        $info=$a->save($data);
        if($info){
            $return = ['ret'=>1,'msg'=>'添加成功'];
        }else{
            $return = ['ret'=>0,'msg'=>'添加失败'];
        }
        echo json_encode($return);
    }

    /**
     * 列表展示页面
     *
     * @param  \think\Request  $request   count统计数量
     * @return \think\Response
     */
    public function list()
    {
        
        $a=new catmodel;
        $list=$a->all()->order('sort_order','desc');
        $list=createTree($list);
        foreach($list as $k=>$v){
            $cat_id=$v['cat_id'];
            $count=\Db::name('goods')->where('cat_id',$cat_id)->count();
            // var_dump($count);
            $list[$k]['parent_id']=$count;
        }
        $this->assign('list',$list);
        return $this->fetch();
    }

    /**
     * 删除执行页面
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function del()
    {
        $id=input('param.id');
        $list=\Db::name('Cat')->where('parent_id',$id)->all();
        if($list){
            $this->error('有子类不能删除');die;
        }
        $doodsdata=\Db::name('goods')->where('cat_id',$id)->all();
        // var_dump($doodsdata);
        if($doodsdata){
            $this->error('分类下有商品不能删除');die;
        }
        $del=\Db::name('Cat')->delete($id);
        if($del){
            $this->success('删除成功');
        }
    }

    /**
     * 修改页面
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function upd()
    {
        $a=new catmodel;
        $lista=$a->all();
        $lista=createTree($lista);
        $this->assign('lista',$lista);


        $id=input('param.id');
        $list=\Db::name('Cat')->find($id);
        $this->assign('list',$list);
        return $this->fetch();
    }

    /**
     * 修改执行页面
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function upd_do()
    {
        $cat_id=input('param.cat_id');
        $data=input('post.');
        $a=new catmodel;
        $upda=$a->save($data,['cat_id'=>$cat_id]);
        // $upda=\Db::name('Cat')->where("cat_id",$cat_id)->update($data);
        if($upda){
            $this->success('修改成功','list');
        }else{
            $this->error('修改失败');
        
        }
        
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
