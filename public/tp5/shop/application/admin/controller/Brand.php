<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
class Brand extends Base
{
    /**
     * 品牌列表列表
     *
     * @return \think\Response
     */
    public function index()
    {
        // 接收搜索条件 
        $query = input('get.');
        // print_r($query);
        $where = [];
        if(!empty($query['brand_name'])){
            $where[] = ['brand_name','like',"%".$query['brand_name']."%"];
        }
        if(!empty($query['brand_url'])){
            $where[] = ['brand_url','like',"%".$query['brand_url']."%"];
        }

        //查询品牌数据
        $brand_model=model('Brand');
        $info = $brand_model
        ->where($where)
        ->paginate(3,false,['query'=>$query]);//分页搜索
        // $info = $brand_model->all();
        $this->assign('info',$info);
        $this->assign('query',$query);
        return $this->fetch();
    }
    /* 
        添加执行
    */    
    public function add_do()
    {
        // 接收表单数据  这里没有文件上传文件上传要单独做
        $data = input('post.');
        // dump($data);没事就打印看效果
        $brandmodel=model('Brand');//链接数据库操作唯一性
        $info=$brandmodel->where('brand_name',$data['brand_name'])->count();
         //手动增加字段时间
         $data['add_time'] = date("Y-m-d H:i:s");

        //表单验证，没有文件上传  做名称不能为空，唯一性 网址 的操作。。。修改的验证也要做   
        if(empty($data['brand_name'])){
            $this->error('品牌名称必填',url('Brand/create'));exit();
        } 
        if($info==1){
            $this->error('名称已存在');
        }
        //网址
        $url='/^www(\.)[a-z0-9]{2,11}(\.)com|net$/';
        if(empty($data['brand_url'])){
            $this->error('地址不能为空',url('Brand/create'));exit();
        }else if(!preg_match($url,$data['brand_url'])){
            $this->error('格式要www开头，英文数字，以com net结尾');
        }      


            // 获取表单上传文件 
            $file = request()->file('brand_img');            
                // 移动到框架应用根目录/uploads/ 目录下
                 $info = $file->move('./static/admin/uploads');
                 if($info){                      
                        // 上传失败获取错误信息 
                        echo $file->getError();
                    } 
                
                // 文件准备入库
             $data['brand_img']='/static/admin/uploads/'.$info->getSaveName();
            // dump($data);

            // 项目入库不能用Db类,要用模型
             $brand_model=model('Brand');//另一种引入模型的方法
            // print_r($brand_model);
          $res = $brand_model->save($data);
          if($res){
              $this->success('添加成功','index');
          }else{
              $this->error('添加失败','create');
          }

    }


    /**
     * 显示创建品牌添加表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        
        return $this->fetch();
    }

    
    /**
     *==================================即点即改
     */
    public function upd()
    {
        
        $value = input('post.value');
        $field = input('post.field');
        $brand_id = input('post.brand_id');
        // 验证唯一性之后 在进行修改 验证brand_name 和$value数据库
        $Bmodel=model('Brand');
        $wherea = [
            ['brand_name','=',$value],
        ];
          $res = $Bmodel->where($wherea)->find();   
        //   dump($value);
        if($res){
            echo "重复";
        }else{
            //条件
        $where[]= [
            ['brand_id','=',$brand_id],
        ];
        //修改的数组
        $data = [$field=>$value];
        //  print_r($where); 
        //  print_r($data);die(); //打印看效果
        // 
        $res = $Bmodel->where($where)->update($data);
        // dump($res);exit;
        if($res){
            echo 1;
        }else{
            echo 2;
        }
        }
        

        
        
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit()
    {
        $brand_id = input('get.brand_id');
        // 项目入库不能用Db类,要用模型
        $brand_model=model('Brand');//另一种引入模型的方法
        $upda=$brand_model->where('brand_id',$brand_id)->find();
        $this->assign('list',$upda);
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update()
    {
        $data = input('post.');
        // 项目入库不能用Db类,要用模型   
        // var_dump($data);exit;
        $brand_model=model('Brand');
        $info=$brand_model->where('brand_name',$data['brand_name'])->count();
        // dump($info);exit();
        if(empty($data['brand_name'])){
            $this->error('修改品牌名称不能为空',url('Brand/edit'));exit();
        } 
        if($info==1){
            $this->error('名称已存在，修改重新取名',url('Brand/edit'));
        }

        $res = $brand_model->save($data,["brand_id"=>$data['brand_id']]);
        if($res){
            $this->success('修改成功',url('Brand/index'));
        }else{
            $this->error('修改失败',url('Brand/edit'));
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete()
    {
        $id = input('get.brand_id');
        // echo $id;
        $where=[
            ['brand_id','in',$id],
        ];
         $brand_model = model('Brand');
         $res = $brand_model->where($where)->delete();
         if($res){
            $this->success('删除成功',url('Brand/index'));
        }else{
            $this->error('删除失败',url('Brand/index'));
        }
    }
}
