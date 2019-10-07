<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Category extends Base
{
    /**
     * 显示分类列表资源列表
     *n
     * @return \think\Response
     */
    public function index()
    {
        $cc = model('Category');
        $info = $cc->all();
        $info=CreateTree($info);//直接调用看效果
        $this->assign('info',$info);
        return $this->fetch();
    }

    /**
     * 显示分类添加表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $cc = model('Category');
        $list = $cc->all();//查询已有分类数据
        $list=CreateTree($list);

         $this->assign('list',$list);
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save()
    {
        $data = input('post.');
        // 验证不能为空，唯一性
        $cate_model = model('Category');        
        $info=$cate_model->where('cate_name',$data['cate_name'])->count();//验证唯一性
        if(empty($data['cate_name'])){
            errorly('名称不能为空');
        }
            
        if($info==1){
            errorly('已有名称，重新更换');
         }
        
        
        

        // 入库
        $cate_model = model('Category');        
        $res = $cate_model->save($data);
        // dump($res);
        if($res){
            successly('添加成功');
        }else{
            errorly('添加失败');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete()
    {
        $data = input('get.cate_id');
        // echo $id;exit;走一步测一步
        // 检查此分类下有没有子类
        $cate_model = model('Category');        
       $where[] = ['parent_id','=',$data];
     $count = $cate_model->where($where)->count();//查询当前分类下子类的条数 
    //  echo $cate_model->getLastSql();exit; 这个输出看sql语句在查询之后
    if($count>0){
        $this->error('分类下有子类，不能删除',url('Category/index'));exit;
    }
    //检查末级分类下有没有商品
    $where1[] = [
        'cate_id','=',$data
    ];
    $goods_model = model('Goods');
    $count1 = $goods_model->where($where1)->count();
    
    if($count1>0){
        $this->error('分类下有子类商品，不能删除',url('Category/index'));exit;
    }
    //  执行删除 试做ajax删除 这样页面不会刷新 使用remove删除
    
    $res = $cate_model->where($where1)->delete($data);
    
    if($res){
        $this->success('删除成功',url('Category/index'));exit;
        
    }else{
        $this->error('删除失败',url('Category/index'));exit;
    }
    }
}
