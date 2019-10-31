<?php

namespace App\Http\Controllers\wecha;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tools\Tools;

class LoginController extends Controller
{
    public $tools;
    public $request;
    public function __construct(Tools $tools,Request $request)
    {
        $this->tools=$tools;
        $this->request=$request;
    }
    //授权登陆
    public function wecha_login()
    {
    	$urls=urlencode(env('APP_URL').'/wecha/code');
    	$url= 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxcc4c342a42f5b788&redirect_uri='.$urls.'&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect';
    	header('Location:'.$url);
    }
    //授权登陆后获取关注着的基本信息
    public function wecha_code(Request $request)
    {
    	$req=$request->all();
    	$url=file_get_contents('https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxcc4c342a42f5b788&secret=2b8173213438d9c74982a38e99624119&code='.$req['code'].'&grant_type=authorization_code');
    	$url=json_decode($url,1);
    	$url2=file_get_contents('https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=wxcc4c342a42f5b788&grant_type=refresh_token&refresh_token='.$url['refresh_token']);
    	$url2=json_decode($url2,1);
    	// dump($url2['access_token']);
        //获取登陆的人的基本信息
    	$url3=file_get_contents('https://api.weixin.qq.com/sns/userinfo?access_token='.$url2['access_token'].'&openid='.$url2['openid'].'&lang=zh_CN');
//    	dump($url3);
        $urls = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->tools->get_access_token().'&next_openid=';
        $urls1=$this->tools->curl_get($urls);
        $urls1=json_decode($urls1,1);
        $openid = $urls1['data']['openid'];
        $lists=[];
//        foreach($openid as $k=>$v){
//            循环获取关注着信息
            $list=file_get_contents('https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->tools->get_access_token().'&openid=oZi7qw5zG0HWRefZxAeT74SlNtF8&lang=zh_CN');
            $results=json_decode($list,1);
            $lists[]=$results;
//        }
        //获取关注者列表
//        dump($lists);
        return view('wechat/kess_ado',['lists'=>$lists]);
    }
}
