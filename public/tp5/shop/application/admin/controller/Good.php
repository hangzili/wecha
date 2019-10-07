<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Good extends Base
{
   
    

    /**
     * 显示商品添加表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        // 查询品牌名称
        $brand_model=model('Brand');
        $brandInfo = $brand_model->select();

        // 查询分类名称
        $cc = model('Category');
        $cateInfo = $cc->all();
        $cateInfo=CreateTree($cateInfo);

        $this->assign('brandInfo',$brandInfo);
        $this->assign('cateInfo',$cateInfo);
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
        // 验证非空唯一  价格纯数字和小数点



        // 获取图品信息
        $file = request()->file('goods_img');
        $info = $file->move( './goods_img');
        if(empty($info)){
            $this->error($file->getError());exit;
            //  echo $file->getError();exit;没有文件上传不能报错，要提示上面那句
        }
       $data['goods_img'] ='/goods_img/'.$info->getSaveName();
    //      print_r($data);exit;//文件上传成功 存放位置结合做多图

        // 获取相册信息
        $files = request()->file('goods_imgs');
        $str = "";//把文件上传的多张图片放进字符串里
        // print_r($files);exit;
        foreach($files as $file){ 
            // 移动到框架应用根目录/goods_imgs/ 目录下 循环的是多文件信息
            $info = $file->move( './goods_imgs'); //$file每一张图片信息
            if(empty($info)){
                echo $file->getError();exit;//得到每一张图片的错误信息
            }else{
                $str.='/goods_imgs/'.$info->getSaveName().'|';//多图的路径存储到字符串 $str
            }
        }
        $data['goods_imgs']=rtrim($str,'|');//多张图的路径赋值到goods_imgs

        //接下来验证
        $gmodel=model('Goods');
        $res=$gmodel->save($data);
        // var_dump($res);//没事就打印
        if($res){
            $this->success('添加商品成功',url('Good/index'));
        }else{
            $this->error('添加失败');
        }
    }
     /**
     * 显示商品列表
     *
     * @return \think\Response
     */
    public function index()
    {
  
        // 搜索 条件
        $query = input('get.');
        // print_r($query);确定能接到所有的值，就能做搜索了
        $where=[];
        if(!empty($query['goods_name'])){
            $where[] = ['goods_name','like',"%".$query['goods_name']."%"];
        }
        // 判断价格两边都填写  ，只填写低价格，只填写高价格
        if(!empty($query['min_price'])&&!empty($query['max_price'])){
            $where[]=['goods_price','between',[$query['min_price'],$query['max_price']]];
        }
        if(!empty($query['min_price'])&&empty($query['max_price'])){
            $where[] = ['goods_price','gt',$query['min_price']];
        }
        
        if(empty($query['min_price'])&&!empty($query['max_price'])){
            $where[] = ['goods_price','lt',$query['max_price']];
        }
        
        //print_r($where);exit;
         
        // 搜索
        if(!empty($query['brand_name'])){
            $where[] = ['brand_name','=',$query['brand_name']];
        }
        if(!empty($query['cate_name'])){
            $where[] = ['cate_name','=',$query['cate_name']];
        }
      
        // echo $gmodel->getLastSql();exit;
        
         // 查询商品数据，列表展示
         $gmodel=model('Goods');
         $glist = $gmodel
         ->field("g.*,brand_name,cate_name")
         ->alias('g')
         ->join("shop_brand b","g.brand_id=b.brand_id")
         ->join("shop_category c","g.cate_id=c.cate_id")
         ->where($where)
         ->paginate(3,false,['query'=>$query]);
         foreach($glist as $k=>$v){
             $glist[$k]['goods_imgs'] = explode('|',$v['goods_imgs']);//把一个字符串切割成数组  
             // implode 把数组连接成字符串
         }
         // print_r($glist);exit;
         // 查询品牌名称// 搜索 条件
         $brand_model=model('Brand');
         $brandInfo = $brand_model->select();
         // 查询分类名称
        $cc = model('Category');
        $cateInfo = $cc->all();
        $cateInfo=CreateTree($cateInfo);

        $this->assign('query',$query);
        $this->assign('brandInfo',$brandInfo);
        $this->assign('cateInfo',$cateInfo);
        $this->assign('glist',$glist);
        return $this->fetch();
    }

    // 即点即改名称
    public function changeValue()
    {
        $value = input('post.value');//接收新值
        $file = input('post.file');//接收字段
        $goods_id = input('post.goods_id');//接收商品id
            // dump($value);
            // dump($file);
            // dump($goods_id);走到这一定要打印看效果有没有接收到值
        $gmodel = model('Goods');
        $where[] = 
            ['goods_id','=',$goods_id];
        $data = [$file=>$value];//把字段改为你要修改的新值
        $res = $gmodel->where($where)->update($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
        
    }

    // 显示修改的视图页面
    public function edit()
    {
        $goods_id = input('get.goods_id');
        // 根据id查询要修改的，作为表单的默认值
        $gmodel = model('Goods');
        $where[] = ['goods_id','=',$goods_id];
        $ginfo = $gmodel->where($where)->find()->toArray();
        $ginfo['goods_imgs'] = explode('|',$ginfo['goods_imgs']);//操作相册  这是一维数组
        // print_r($ginfo);//到这查出来的是对象，要改成一维数组数组操作加toArray
        
        
         // 查询品牌名称 作为修改下拉菜单的值
         $brand_model=model('Brand');
         $brandInfo = $brand_model->select();
 
         // 查询分类名称 作为修改下拉菜单的值
         $cc = model('Category');
         $cateInfo = $cc->all();
         $cateInfo=CreateTree($cateInfo);
 
         $this->assign('brandInfo',$brandInfo);
         $this->assign('cateInfo',$cateInfo);
         $this->assign('ginfo',$ginfo);
         return $this->fetch();

    }
    //执行修改
    public function update()
    {
        $data = input('post.');
        // print_r($data);
        // 获取图片信息
        $img = $_FILES['goods_img'];
      if($img['error']==0){
        $file = request()->file('goods_img');
       $info = $file->move( './goods_img');
       if(empty($info)){
           $this->error($file->getError());exit;
           //  echo $file->getError();exit;没有文件上传不能报错，要提示上面那句
       }
      $data['goods_img'] ='/goods_img/'.$info->getSaveName();
   //      print_r($data);exit;//文件上传成功 存放位置结合做多图
      }
       

       // 获取相册相册信息
       $imgs = $_FILES['goods_imgs'];
       if($imgs['error'][0]==0){
        $files = request()->file('goods_imgs');
        $str = "";//把文件上传的多张图片放进字符串里
        // print_r($files);exit;
        foreach($files as $file){ 
            // 移动到框架应用根目录/goods_imgs/ 目录下 循环的是多文件信息
            $info = $file->move( './goods_imgs'); //$file每一张图片信息
            if(empty($info)){
                echo $file->getError();exit;//得到每一张图片的错误信息
            }else{
                $str.='/goods_imgs/'.$info->getSaveName().'|';//多图的路径存储到字符串 $str
            }
        }
        $data['goods_imgs']=rtrim($str,'|');//多张图的路径赋值到goods_imgs
       }

       //获取完商品相册信息后做修改
       $gmodel = model('Goods');
       $where[] = ['goods_id','=',$data['goods_id']];
       $res = $gmodel->where($where)->update($data);
       if($res){
           $this->success('修改成功',url('Good/index'));
       }else{
           $this->error('修改失败');
       }
      

    
}
}