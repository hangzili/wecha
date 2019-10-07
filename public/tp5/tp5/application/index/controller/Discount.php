<?php

namespace app\index\controller;
use app\admin\model\Discount as model;
use think\Controller;
use think\Request;

class Discount extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        // $session=Session('indexsession');
        // if($session==""){
        //     $this->success('先登陆','login/login');
        // }
        $list=model::join('cat','cat.cat_id=Discount.d_cat')->paginate(2);
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function getto()
    {
        if(!$this->checkLogin()){
            echo json_encode(['asda'=>'0001','asd'=>'请先登陆']);die;
        }

        model::startTrans();
        try {
            $id=input('post.id');
            $user_id=Session('indexsession')['id'];
            $where=[
                'd_id'=>$id,
                'user_id'=>$user_id
            ];
            $in=\Db::name('user_dis')->where($where)->all();
            if($in){
                echo json_encode('已经领取过优惠券');die;
            }
            $into=\Db::name('user_dis')->insert($where);
            echo json_encode('优惠券领取成功');
            model::commit();
        } catch (\Exception $e) {
            // 回滚事务
            model::rollback();
        }
    }
    
}
