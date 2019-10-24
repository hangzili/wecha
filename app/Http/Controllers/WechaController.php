<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Fachades\Cache;
use App\Tools\Tools;
use App\wechat\UserModel as User;
use Illuminate\Support\Facades\Storage;
class WechaController extends Controller
{
    public $tools;
    public $request;
    public function __construct(Tools $tools,Request $request)
    {
        $this->tools=$tools;
        $this->request=$request;
    }
    //带参数的二维码
    public function wechat_list()
    {
        $user_info = User::get();
        // dd($user_info);
        return view('Wechat.wechatList',['user_info'=>$user_info]);
    }
    //带参数的二维码
    public function create_qrcode(Request $request)
    {
        $req = $request->all();
        $url = 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$this->tools->get_access_token();
        $data = [
            'expire_seconds'=> 30 * 24 * 3600,
            'action_name'=>'QR_SCENE',
            'action_info'=>[
                'scene'=>[
                    'scene_id'=>$req['uid']
                ]
            ]
        ];
        $re = $this->tools->curl_post($url,json_encode($data));
        $result = json_decode($re,1);
        // dd($result);
        $qrcode_url = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.$result['ticket'];
        $qrcode_source = $this->tools->curl_get($qrcode_url);
        // dd($qrcode_source);
        $qrcode_name = $req['uid'].rand(10000,99999).'.jpg';
        
        Storage::put('wechat/qrcode/'.$qrcode_name, $qrcode_source);
        User::where(['id'=>$req['uid']])->update([
            'qrcode_url'=>'/storage/wechat/qrcode/'.$qrcode_name
        ]);
        return redirect('/wechat/wechat_list');
    }
	
	
    public function user()
    {
    	$res=file_get_contents('https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->tools->get_access_token().'&next_openid=');
    	// dd($res);
    	$result=json_decode($res,1);
    	// dump($result);
    	$openid_list=$result['data']['openid'];
    	$lists=[];
    	foreach($openid_list as $v){

    		$list=file_get_contents('https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->tools->get_access_token().'&openid='.$v.'&lang=zh_CN');
    		$results=json_decode($list,1);
    		$lists[]=$results;
    	}
    	// dump($lists);
    	return view('wecha/user',['lists'=>$lists]);
    }
    //
    public function get_lication()
    {
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $appId = 'wxcc4c342a42f5b788';
        $timestamp = time();
        $nonceStr = rand(1000,9999).'jssdk'.time();
        $jsapi_ticket = $this->tools->get_jsapi_ticket();
        $sign_str = 'jsapi_ticket='.$jsapi_ticket.'&noncestr='.$nonceStr.'&timestamp='.$timestamp.'&url='.$url;
        $signature = sha1($sign_str);
        return view('wechat/location',['appId'=>$appId,'timestamp'=>$timestamp,'nonceStr'=>$nonceStr,'signature'=>$signature]);
    }
}
