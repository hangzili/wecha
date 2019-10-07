<?php

namespace app\admin\controller;
use app\admin\controller\Base;
use think\Controller;
use think\Request;
use app\admin\model\Goods as gmodel;
class Goods extends base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //分类
        $cat=\Db::name('Cat')->all();
        $cat=createTree($cat);
        $this->assign('cat',$cat);
        //品牌
        $brand=\Db::name('brand')->all();
        $this->assign('brand',$brand);
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.添加页面
     *
     * @return \think\Response
     */
    public function create()
    {
        $data=input('param.');
        // dump($data);
        //商品货号
        $data['goods_sn']=$this->goodssn();
        //图片上传
        $data['goods_img']="";
        if(!empty($_FILES['goods_img']['name'])){
                $data['goods_img']=$this->upload('goods_img');
        }
        //添加时间
        $data['add_time']=date("Y-m-d H:i:s",time());
        $a= new gmodel;
        $info=$a->save($data);
        // var_dump($info);

        $goods_id=$a->goods_id;
        // var_dump($goods_id);
        //多文件上传
        $list=[];
        
        // dump($img_url);
        if(!empty($img_url)){
            $img_url=$this->uploa();
        foreach($data['img_desc'] as $k=>$v){
            $list[]=
            [
                'img_desc'=>$v,
                'goods_id'=>$goods_id,
                'img_url'=>$img_url[$k],
            ];
        }
        // dump($list);多条数据上传
        $do=\Db::name('goods_img')->insertAll($list);
        }
        $this->success("添加成功",'read');
    }
    public function goodssn()
    {
        return date("YmdHis").rand(1,99);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源   列表展示
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read()
    {
        $where=[];
        $cat_id=input('get.cat_id');
        if(!empty($cat_id)){
            $where[]=['goods.cat_id','=',$cat_id];
        }
        $brand_id=input('get.brand_id');
        if(!empty($brand_id)){
            $where[]=['brand_id','=',$brand_id];
        }
        $is_on_sale=input('get.is_on_sale');
        if($is_on_sale==="0" || $is_on_sale==="1"){
            $where[]=['is_on_sale','=',$is_on_sale];
        }
        $goods_name=input('get.goods_name');
        if(!empty($goods_name)){
            $where[]=['goods_name','like','%$goods_name%'];
        }
        // dump($where);
        $list=\Db::name('goods')->where($where)->join('brand','goods.brand_id=brand.id')
                ->join('cat','cat.cat_id=goods.cat_id')
                ->paginate(2);
        $page=$list->render();
        if(request()->isAjax()){
            $list=$list->toArray();
            $list['page']=$page;
            echo json_encode($list);die;
        }
        //品牌分类
        $cat=\Db::name('Cat')->all();
        $cat=createTree($cat);
        $this->assign('cat',$cat);
        //品牌
        $brand=\Db::name('brand')->all();
        $this->assign('brand',$brand);

        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->fetch();
        // var_dump($list);
    }            
    /**
     * 批量删除
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function del()
    {
        $arr=input('param.');
        $arrr=array_pop($arr);
                    // var_dump($arrr);
        $a= new gmodel;
                    // $dell=$a->destroy($arr);
                    // $dell=\Db::name('goods')->destroy($arr);
        $dell=\Db::table('goods')->delete($arrr);
        var_dump($dell);
    }

    /**
     * 保存更新的资源   修改
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update()
    {
        // $data=input('get.');
        // // dump($data);
        // $del=\Db::name('goods')->update($data);
        // var_dump($del);


        $date=input("get.");
        $model= new gmodel;
        $info=$model->update($date);
        dump($info);
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
