<?php
namespace App\Tools;
use Illuminate\Support\Facades\Cache;
class Tools {
    /**
     * 公众号标签列表
     * @return mixed
     */
    public function tag_list()
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/tags/get?access_token='.$this->get_access_token();
        $re = $this->curl_get($url);
        $result = json_decode($re,1);
        return $result;
    }
    /**
     * 素材
     * @return 
     */
    public function wechat_curl_file($url,$data)
    {
        $curl = curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
    /**
     * 根据openid获取用户的基本信息
     * @param $openid
     * @return mixed
     */
    public function get_wechat_user($openid)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->get_access_token().'&openid='.$openid.'&lang=zh_CN';
        $re = file_get_contents($url);
        $result = json_decode($re,1);
        return $result;
    }
    /**
     * 获取微信access_token
     */
    public function get_access_token()
    {  
     $key="wechat_access_token";
     if(\Cache::has($key)){
         $wechat_access_token=\Cache::get($key);
     }else{
         $re=file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxcc4c342a42f5b788&secret=2b8173213438d9c74982a38e99624119");
            
         $result=json_decode($re,1);
         \Cache::put($key,$result['access_token'],$result['expires_in']);
         $wechat_access_token=$result['access_token'];
     }
     return $wechat_access_token;
    }

     /**
     * 获取微信jsapi_ticket
     */
    public function get_jsapi_ticket()
    {
        $key = 'wechat_jsapi_ticket';
        //判断缓存是否存在
        if(Cache::has($key)) {
            //取缓存
            $wechat_jsapi_ticket = Cache::get($key);
        }else{
            //取不到，调接口，缓存
            $re = file_get_contents('https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$this->get_access_token().'&type=jsapi');
            $result = json_decode($re,true);
            Cache::put($key,$result['ticket'],$result['expires_in']);
            $wechat_jsapi_ticket = $result['ticket'];
        }
        return $wechat_jsapi_ticket;
    }
    /**
     * post
     * @param $url
     * @param $data
     * @return bool|string
     */
    public function curl_post($url,$data)
    {
        $curl = curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
    /**
     * get
     * @param $url
     * @return bool|string
     */
    public function curl_get($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
}