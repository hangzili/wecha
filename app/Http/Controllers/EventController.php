<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\Tools;
use App\wechat\UserwechaModel;
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
            //关注之后回消息
        if($xml_arr['MsgType'] == 'event' && $xml_arr['Event'] == 'subscribe'){
            $wechat_user = $this->tools->get_wechat_user($xml_arr['FromUserName']);
            $msg = '你好'.$wechat_user['nickname'].'，欢迎关注我的宝贝！';
            echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";
        }
            //"你好"   回复 "你好"
        if($xml_arr['MsgType'] == 'text' && $xml_arr['Content'] == '你好'){
            $wechat_user = $this->tools->get_wechat_user($xml_arr['FromUserName']);
            $msg = '我好你也好';
            echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";
        }

            //签到领积分
        if($xml_arr['MsgType'] == 'event' && $xml_arr['Event'] == 'CLICK' && $xml_arr['EventKey'] == 'sign'){
            //从表里获取用户签到的记录
            $usere_wechat = UserwechaModel::where(['openid'=>$xml_arr['FromUserName']])->first();
            $today = date('Y-m-d',time()); //今天
            $last_day = date('Y-m-d',strtotime("-1 days")); //昨天
                //第一次签到
            if($usere_wechat == null){
                    $data = [
                        'openid'=>$xml_arr['FromUserName'],
                        'uid'=>1
                        'sign_day'=>$today,
                        'sign_num'=>1
                        'sign_score'=>2
                    ];
                    UserwechaModel::insert($data);
            }else{
            //判断今天是否签到 
            if($usere_wechat->sign_day == $today){
                //签到了返回  签到了
                $msg = '您已签到，请勿重复签到';
                echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";
            }else{
                //第一次签到
                
                //如果客户没有签到
                if($usere_wechat->sign_day == $last_day){
                    //连续签到
                    $sign_num = $usere_wechat->sign_num + 1;
                    if($sign_num >= 6){
                        $sign_num = 1;
                    }
                    UserwechaModel::where(['openid'=>$xml_arr['FromUserName']])->update([
                        'sign_day'=>$today,
                        'sign_num'=>$sign_num,
                        'sign_score'=>$usere_wechat->sign_score + 5 * $sign_num
                    ]);
                }else{
                    //非连续签到
                    UserwechaModel::where(['openid'=>$xml_arr['FromUserName']])->update([
                        'sign_day'=>$today,
                        'sign_num'=>1,
                        'sign_score'=>$usere_wechat->sign_score + 5
                        ]);
                }
                 }
                $msg = '签到成功';
                echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";
            }
        }
            
        

    }
}
