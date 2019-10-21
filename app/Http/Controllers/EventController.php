<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\Tools;
class EventController extends Controller
{
	public $tools;
    public $request;
    public function __construct(Tools $tools,Request $request)
    {
        $this->tools=$tools;
        $this->request=$request;
    }
    //管理
    public function event()
    {
    		// 接收xml数据  接收微信发过来的数据
    	$info = file_get_contents("php://input");
    		//将字符串写入文件
        file_put_contents(storage_path('logs/wechat/'.date('Y-m-d').'.log'),"<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n",FILE_APPEND);
        file_put_contents(storage_path('logs/wechat/'.date('Y-m-d').'.log'),$info,FILE_APPEND);
        	//xml格式字符串转化为对应的SimpleXMLElement对象   解析xml数据的
        $xml_obj = simplexml_load_string($info,'SimpleXMLElement',LIBXML_NOCDATA);
        	//将对象转化为数组格式23
        $xml_arr = (array)$xml_obj;
        // dump($xml_arr);
        // if($xml_arr['MsgType'] == 'event' && $xml_arr['Event'] == 'subscribe'){
        //     $wechat_user = $this->tools->get_wechat_user($xml_arr['FromUserName']);
        //     $msg = '你好'.$wechat_user['nickname'].'，欢迎关注我的宝贝！';
        //     echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";
        // }
        if($xml_arr['MsgType'] == 'text' && $xml_arr['Content'] == '你好'){
            $wechat_user = $this->tools->get_wechat_user($xml_arr['FromUserName']);
            $msg = '我好你也好';
            echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";
        }

    }
}
