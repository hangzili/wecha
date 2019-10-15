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

    public function event()
    {
    		// 接收xml数据  接收微信发过来的数据
    	$info = file_get_contents("php://input");
    		//将字符串写入文件
        file_put_contents(storage_path('logs/wechat/'.date('Y-m-d').'.log'),"<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<",FILE_APPEND);
        file_put_contents(storage_path('logs/wechat/'.date('Y-m-d').'.log'),$info,FILE_APPEND);
        	//xml格式字符串转化为对应的SimpleXMLElement对象   解析xml数据的
        $xml_obj = simplexml_load_string($info,'SimpleXMLElement',LIBXML_NOCDATA);
        	//将对象转化为数组格式
        $xml_arr = (array)$xml_obj;
        dump($xml_arr);
    }
}
