<?php

namespace App\Http\Controllers\wecha;

use Illuminate\Http\Request;
use App\Tools\Tools;
use App\Http\Controllers\Controller;
class LongsController extends Controller
{
	public $tools;
    public $request;
    public function __construct(Tools $tools,Request $request)
    {
        $this->tools = $tools;
        $this->request = $request;
    }
    public function long()
    {
    	return view('long/long');
    }
    public function longs(Request $request)
    {
    	// $urls=urlencode(env('APP_URL').'/long/code');
    	$url= 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxcc4c342a42f5b788&redirect_uri=http://www.a.cn/long/code&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect';
    	header('Location:'.$url);
    }
    public function code(Request $request)
    {
    	$req=$request->all();
    	$url=file_get_contents('https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxcc4c342a42f5b788&secret=2b8173213438d9c74982a38e99624119&code='.$req['code'].'&grant_type=authorization_code');
    	$url=json_decode($url,1);
    	$url2=file_get_contents('https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=wxcc4c342a42f5b788&grant_type=refresh_token&refresh_token='.$url['refresh_token']);
    	$url2=json_decode($url2,1);
    	$url3=file_get_contents('https://api.weixin.qq.com/sns/userinfo?access_token='.$url2['access_token'].'&openid='.$url2['openid'].'&lang=zh_CN');
    	if($url3){
    		// dump($url3);
    		$urls = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->tools->get_access_token().'&next_openid=';
    		$urls1=$this->tools->curl_get($urls);
    		$urls1=json_decode($urls1,1);
    		dump($urls1['data']['openid']);
    		
    		
    	}
    }
}
