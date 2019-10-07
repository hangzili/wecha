<?php
namespace app\index\controller;
use think\Controller;

class Goods extends Common
{
    public function goods_list()
    {
        $this->getCateInfo();
        //
        $cate_id=input('get.cate_id');
        $where=[];
        //品牌     cate  分类
        if(!empty($cate_id)){
            $cate=model('Category');
            $cate_ids=$cate->all();
            $cat=getCateId($cate_ids,$cate_id);
            $where[]=[
                'cate_id','in',$cat
            ];
        }
        $goods_model=model('Goods');
        //商品品牌 id
        $brand_id=$goods_model->where($where)->column('brand_id');
        $brand_id=array_unique($brand_id);
        //商品品牌
        $brandwhere=[
            ['brand_id','in',$brand_id]
        ];
        $brandmodel=model('Brand');
        //获取所有品牌
        $brand=$brandmodel->where($brandwhere)->all();
        

        //价格
        $goods_price=$goods_model->where($brandwhere)->order('goods_price','desc')->value('goods_price');
        $priceSectioe=$this->price($goods_price);
        // dump($priceSectioe);
        $where[]=['is_up','=',1];
        $where[]=['is_hot','=',1];
        $goodsInfo=$goods_model
            ->field('goods_id,goods_name,goods_price,goods_img')
            ->where($where)
            ->page(1,4)
            ->select();
        //页码
        $a=$goods_model
            ->where($where)
            ->count();
        $page=new \page\AjaxPage();
        $str=$page->ajaxpager(1,$a,4);
        //浏览记录
        if($this->checkLogin()){
            //登陆从数据库读取数据
            $historyInfo=$this->getHistoryDb();
        }else{
            //没登陆从cookie中读取
            $historyInfo=$this->getHistoryCookie();
        }

        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('historyInfo',$historyInfo);
        $this->assign('str',$str);
        $this->assign('brand',$brand);
        $this->assign('priceSectioe',$priceSectioe);

        
        return $this->fetch();//显示视图
    }
     //登陆从数据库中读取浏览记录
    public function getHistoryDb()
    {

     
        $user_id=session('userData.user_id');
        $history_model=model('history');
        $where=[
            ['user_id','=',$user_id]
        ];
        $goods_id=$history_model->where($where)->order('look_time','desc')->limit('4')->column('goods_id');
        $goods_id=array_unique($goods_id);
        $goods_model=model('Goods');
        $goodsWhere=[
            ['goods_id','in',$goods_id]
        ];
        if(!empty($goods_id)){
            $goods_id=implode(',',$goods_id);
            $exp=new \think\db\Expression("field(goods_id,$goods_id)");
            $HistoryInfo=$goods_model->where($goodsWhere)->order($exp)->select();
        }else{
            $HistoryInfo=$goods_model->where($goodsWhere)->select();
        }
        if(!empty($HistoryInfo)){
            return $HistoryInfo;
        }else{
            return false;
        }
        
    }
    //没登陆从cookie中查询浏览记录
    public function getHistoryCookie()
    {
        $cookie=cookie('data');
        if(!empty($cookie)){
            $goods_id=[];
            foreach($cookie as $k=>$v){
                $goods_id[]=$v['goods_id'];
            }
            // dump($goods_id);   array_reverse返回顺序相反的  array_unique去重  array_slice从中取出一段
            $goods_id=array_slice(array_unique(array_reverse($goods_id)),0,4);
            $goods_model=model('Goods');
            $goodsWhere=[
                ['goods_id','in',$goods_id]
            ];
            $goods_id=implode(',',$goods_id);
            $exp=new \think\db\Expression("field(goods_id,$goods_id)");
            $HistoryInfo=$goods_model->where($goodsWhere)->order($exp)->select();
            return $HistoryInfo;
        }else{
            return false;
        }
    }
    //价格的替换
    public function getPrice(){
        $brand_id=input('param.brand_id');
        $goods_model=model('Goods');
        $goods_price=$goods_model->where('brand_id',$brand_id)->order('goods_price','desc')->value('goods_price');
        $priceSectioe=$this->price($goods_price);
        return $priceSectioe;
    }
    //获取价格区间
    function price($goods_price)
    {
        $center=$goods_price/7;
        $arr=[];
        for($i=1;$i<=6;$i++){
            $min=($i-1)*$center;
            $max=($i*$center)-1;
            $arr[]=number_format($min,2).'-'.number_format($max,2);
        }
        $arr[]=number_format(6*$center,2).'以上';
        return $arr;
    }
    //
    public function getGoodsInfo(){
        
        $where=[];
        $brand_id=input('param.brand_id');
        if(!empty($brand_id)){
            $where[]=[
                'brand_id','=',$brand_id
            ];
        }
        //价格
        $goods_price=input('param.goods_price');
        if(strpos($goods_price,'-')>1){
            $price=explode('-',$goods_price);
            $where[]=['goods_price','between',$price];
        }else{
            $price=(float)str_replace(',','',$goods_price);
            $where[]=['goods_price','>=',$price];
        }
        $p=input('param.p');

        $field=input('param.field');

        $type=input('param.type');
        $by=input('param.by');
        $goods_model=model('Goods');
        if($type==2){
            $goodsInfo=$goods_model->where($where)->order('goods_price',$by)->page($p,4)->select();
        }else{
            $where[]=[$field,'=',1];
            $goodsInfo=$goods_model->where($where)->page($p,4)->select();
        }
        //页码
        $page=new \page\AjaxPage();
        $count=$goods_model->where($where)->count();
        $str=$page->ajaxpager($p,$count,4);
        
         $this->assign('goodsInfo',$goodsInfo);
         $this->assign('str',$str);


         echo $this->fetch('table');
        
    }
   
    /** 详情页 */
    public function detail()
    {
        $goods_id=input('get.goods_id');
        // dump($goods_id);
        $goods_model=model('Goods');
        $goods_list=$goods_model->where('goods_id',$goods_id)->find();
        // dump($goods_list);
        $goods_list['goods_imgs']=explode('|',$goods_list['goods_imgs']);
        $this->assign('goods_list',$goods_list);
        // $this->assign('goods_imgs',$goods_imgs);
        // dump($goods_imgs);
        $this->getCateInfo();
        if($this->checkLogin()){
            //登陆 存数据库
            $this->saveHistoryDb($goods_id);
        }else{
            //没登陆
            $this->saveHistoryCookie($goods_id);
        }
        return $this->fetch();
    }
    //登陆浏览记录存数据库
    public function saveHistoryDb($goods_id)
    {
        $user_id=session('userData.user_id');
        $data=['user_id'=>$user_id,'goods_id'=>$goods_id,'look_time'=>time()];
        $history_model=model('History');
        $res=$history_model->save($data);

    }
    //没登陆浏览记录存cookie
    public function saveHistoryCookie($goods_id)
    {
        $data=cookie('data');
        if(empty($data)){
            $data=[
                ['goods_id'=>$goods_id,'look_time'=>time()]
            ];
        }else{
            $data[]=['goods_id'=>$goods_id,'look_time'=>time()];
        }
        cookie('data',$data);
    }
}
