<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Category;
use app\admin\model\Labei;
use app\admin\model\Articles;
use app\admin\validate\Article as Av;
class Article extends Controller
{ 
    public function __construct(){
    parent::__construct();
        if(!session('?username')){
          $this->redirect('Login/index');
        }
    }
    public function add()
    {
        $c= new Category;
        $ca= $c->field('id,title')->all();
        $this->assign('ca',$ca);
        $l= new Labei;
        $la=$l->field('id,username')->all();
        $this->assign('la',$la);
        return $this->fetch();
   }
   public function add_do()
   {
        $date=input('post.');
        if(input('?file.image')){
            $file= request()->file('image');
            $info=$file->move('./uploads');

            if($info){
                $date['image']='/uploads/'.$info->getSaveName();
            }else {
                echo $file->getError();
            }
        }else{
            $this->error('没有文件上传');
        }
        $av= new Av;
        if(!$av->check($date))
        {
            $this->error( $av->getError() );
        }

        $a=new Articles;
        $status=$a->save($date);
        if($status){
            $this->success('添加成功','list');
        }else{
            $this->error('添加失败');
        }
   }
    public function list()
    {
        $c= new Category;
        $cate=$c->field('id,title')->all();
        $this->assign('cate',$cate);
        $where =[];
        $query=[];
        if(input('?get.cid'))
        {
            $where[]=['cid','=',input('get.cid')];
            $query['cid']=input('get.a_title');
        }
        if(input('?get.a_title'))
        {
            $where[]=['a_title','like','%'.input('get.a_title').'%'];
            $query['a_title']=input('get.a_title');
        }
        $a= new Articles;
        $list=$a->field('tp_category.title,tp_articles.id,tp_articles.image,tp_articles.a_man,tp_articles.tag_ids,tp_articles.create_time')->where($where)->join('tp_category','tp_articles.cid=tp_category.id')->where($where)->paginate(5,false,['query'=>$query]);
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function del()
    {
       $id=input('param.id');
       // var_dump($id);
       $status= Articles::destroy($id);
       // var_dump($id);
       if($status){
            $this->success('删除成功','list');
       }else{
            $this->error('删除失败');
       }
    }
    public function upd()
    {
         $c= new Category;
        $ca= $c->field('id,title')->all();
        $this->assign('ca',$ca);
        $l= new Labei;
        $la=$l->field('id,username')->all();
        $this->assign('la',$la);

        $id=input('param.id');
        $cate=Articles::get($id);
        // var_dump($cate);
        $this->assign('cate',$cate);
        return $this->fetch();
    }
    public function upd_do()
    {
        $id=input('param.id');
        $date=input('post.');
      if(input('?file.image')){
            $file= request()->file('image');
            $info=$file->move('./uploads');

            if($info){
                $date['image']='/uploads/'.$info->getSaveName();
            }else {
                echo $file->getError();
            }
        }
        $av= new Av;
        if(!$av->check($date))
        {
            $this->error( $av->getError() );
        }
        $a= new Articles;
        $status=$a->save($date,['id'=>$id]);
        // var_dump($status);
        if($status){
            $this->success('修改成功','list');
        }else{
            $this->error('修改失败');
        }
    }
}

