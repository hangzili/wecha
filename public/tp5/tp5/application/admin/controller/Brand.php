<?php

namespace app\admin\controller;
use app\admin\controller\Base;
use think\Controller;
use think\Request;
use app\admin\model\Brand as brands;
class Brand extends Base
{
    /**
     * 品牌添加
     *
     * @return \think\Response
     */
    public function brand()
    {
        return $this->fetch();
    }

    /**
     * 添加执行
     *
     * @return \think\Response
     */
    public function brand_do()
    {
        $date=input('param.');
        if(empty($date['brand_name'])){
            $this->error('品牌名称不能为空');
        }
        $date['brand_logo']="";
        if(!empty($_FILES['brand_logo']['name'])){
            $date['brand_logo']= $this->upload('brand_logo');
        }
        $info=\Db::name('brand')->insert($date);
        if($info){
            $this->success('添加成功','list');
        }
    }



    /**
     * 产品列表
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function list()
    {

        $brand_name=input('param.brand_name');
        // var_dump($brand_name);
        $where=[];
        if(!empty($brand_name)){
            $where[]=["brand_name","like","%".$brand_name."%"];

        }

        $list=\Db::name('brand')->where($where)->paginate(5);
        $page = $list->render();
        if(request()->isAjax()){
            $list = $list->toArray();
            $list['page']=$page;
            echo json_encode($list);die;
        }
        $this->assign('brand_name', $brand_name);
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->fetch();
    }

    /**
     * 产品删除
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function del()
    {
        $id=input('param.id');
        $info=\Db::name('brand')->delete($id);
        // var_dump($info);
        if($info){
            echo 1;die;
        }else{
            echo 0;die;
        }
    }

    /**
     * 对错即点即改
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function changeshow()
    {
        // $is_show=input('get.is_show');
        // $brand_id=input('get.brand_id');
        // $info=\Db::name('brand')->where('id',$brand_id)->update(['is_show'=>$is_show]);
        // var_dump($info);
        $date=input("get.");
        $model= new brands;
        $info=$model->update($date);
        // var_dump($info);
    }
    public function upd()
    {
        $id=input('param.id');
        $info=\Db::name('brand')->find($id);
        // var_dump($info);
        $this->assign('info',$info);
        return $this->fetch();
    }
    public function upd_do()
    {
        $id=input('param.id');
        $data=input('param.');
        if(!empty($_FILES['brand_logo']['name'])){
            $data['brand_logo']="";
            $data['brand_logo']= $this->upload('brand_logo');
            // var_dump($data);
            $indo=\Db::name('brand')->update($data);
        }else{
            $indo=\Db::name('brand')->update($data);
        }
        // $indo=\Db::name('brand')->update($data);
        if($indo){
            $this->success('修改成功','list');
        }
    }

    
}
