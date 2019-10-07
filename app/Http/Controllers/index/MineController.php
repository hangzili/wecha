<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\index\AddressModel;
use App\index\UserModel;
class MineController extends Controller
{
    
    //我的
    public function mine()
    {
    	return view('/index/mine/mine');
    }
    //登陆页面
    public function login()
    {
        return view('/index/mine/login');
    }
    //注册页面
    public function regist()
    {
        return view('/index/mine/regist');
    }
    //注册执行页面
    public function registdo(Request $request)
    {
        $all = $request->except('_token');
        $email = $all['email'];
        $pwd = $all['pwd'];
        $pwdb = $all['pwdb'];
        if($pwd!=$pwdb){
            //两次输入密码不一样
            return redirect("/regist");
        }
        //如果数据库里面有退出
        $lis=UserModel::where('email', $email)->first();
        if($lis){
            return redirect("/regist");
        }else{
            $res=UserModel::create($all);
            session()->put('indexuser', $all);
            
        }
        

    }
    //我的订单
    public function all_orders()
    {
    	return view('/index/mine/all_orders');
    }
    //小金库
    public function myburse()
    {
        return view('index/mine/myburse');
    }
    //交易记录
    public function record()
    {
        return view('index/mine/record');
    }
    
    //银行卡
    public function card()
    {
        return view('index/mine/card');
    }
    //地址展示页面
    public function address_list()
    {
        $model=new AddressModel;
        $list=$model->get();
        // dump($res);
        return view('index/mine/address_list',['list'=>$list]);
    }
    //地址添加
    public function address_edit(Request $request)
    {
        return view('index/mine/address_edit');
    }
    //地址添加执行
    public function address_adddo(Request $request)
    {
        $all = $request->all();
        $model=new AddressModel;
        $res=$model->create($all);
        if($res){
            return redirect("/address_list");
        }
    }
    //地址修改
    public function address_upda(Request $request)
    {
        $all = $request->all();
        $list = AddressModel::findOrFail($all);
        return view('index/mine/address_upda',['list'=>$list]);
    }
    //地址修改执行页面
    public function address_update(Request $request)
    {
        $all = $request->all();
        // $model=new AddressModel;
        $is=['is_default'=>'2'];
        // dd($is);
        $a=AddressModel::select('is_default')->update($is);
        $res=AddressModel::find($all['address_id'])->update($all);
        if($res){
            return redirect("/address_list");
        }
    }
    //地址删除
    public function del(Request $request)
    {
        $all = $request->all();
        $del=AddressModel::where('address_id',$all)->delete();
        if($del){
            return redirect("/address_list");
        }
    }
}
