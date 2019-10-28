<?php

namespace App\Http\Controllers\wecha;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //授权登陆
    public function wecha_login()
    {
    	$urls=urlencode(env('APP_URL').'/wechat/kess_add');
    	$url= 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxcc4c342a42f5b788&redirect_uri=http://47.94.20.198/wechat/kess_add&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect';
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
    	$url3=file_get_contents('https://api.weixin.qq.com/sns/userinfo?access_token='.$url2['access_token'].'&openid='.$url2['openid'].'&lang=zh_CN');
    	dump($url3);
    }
}
