<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Fachades\Cache;
use APP\Tools\Tools;
class WechaController extends Controller
{
    public $tools;
    public function __construct($tools)
    {
        $this->tools = $tools;
    }
	public function index()
	{
		// echo file_get_contents("https://api.weixin.qq.com/cgi-bin/user/get?access_token=26_VERDJYBBRsfb5FtbhnudveRNWGFSCUVAheqbEA_taRi6nMrNn5VBHdrETk_q_PtMdgjffiN_5Ofbg1Y3-uauMFjt5HDtTP3sIA0J0TrYmHtjQZ50nymSfYId8BNG59NQRup7cEc_AupGwWA4NKVgAJABYJ&next_openid=");
		// $res=$this->wechat_access_token();
		// echo $res;
	}
	//获取access_token
    // public function wechat_access_token()
    // {
    // 	$key="wechat_access_token";
    // 	if(\Cache::has($key)){
    // 		$wechat_access_token=\Cache::get($key);
    // 	}else{
    // 		$re=file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxcc4c342a42f5b788&secret=2b8173213438d9c74982a38e99624119");
    		
    // 		$result=json_decode($re,1);
    // 		\Cache::put($key,$result['access_token'],$result['expires_in']);
    // 		$wechat_access_token=$result['access_token'];
    // 	}
    // 	return $wechat_access_token;
    // }
    public function a()
    {
        echo 4;
    }
    public function user()
    {
    	$res=file_get_contents('https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->tools->get_access_token().'&next_openid=');
    	dd($res);
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
    // public function login()
    // {
    // 	$url=urlencode(env('APP_URL').'/user');
    // 	$lis= file_get_contents('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxcc4c342a42f5b788&redirect_uri='.$url.'&response_type=code&scope=snsapi_base&state=123#wechat_redirect');
    	
    // }
    public function get()
    {
        $url='https://www.baidu.com';
        $curl=curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        $result=curl_exec($curl);
        var_dump($result);
        curl_close($curl);
    }
    public function post()
    {
        $url='http://www.baidu.com';
        $curl=curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($curl,CURLOPT_POST,true);
        $post_data=[
            'name'=>222
        ];
        curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
        $result=curl_exec($curl);
        var_dump($result);
        curl_close($curl);
    }
}
