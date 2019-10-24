<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\Tools;
use App\wechat\UserwechaModel as UserWechat;
use App\wechat\ClassModel;
use App\wechat\UserModel;
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
            $msg = '欢迎'.$wechat_user['nickname'].'同学进入选课系统！';
            echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";
        }
        //点击管理课程
        if($xml_arr['MsgType'] == 'event' && $xml_arr['EventKey'] == 'guanli'){
        
            $list = ClassModel::get();
            //如果表空，就添加
            if($list == null){
                // return view('wechat/class_add');die;
                $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$this->tools->get_access_token();
                $data = [
                    "name"=>'菜单',
                    'sub_button'=>[
                        "type"=>'view',
                        'name'=>'展示',
                        'url'=>'http://www.a.cn/wechat/class_add'
                    ]
                ];
                $re = $this->tools->curl_post($url,json_encode($data));
    
            }else{
                //如果不空，修改
                return view('wechat/class_update');
            }
            
        }
    }
        //课程添加执行
        public function class_add_do(Request $request)
        {
            $all = $request->all();
            
        }
        //课程添加
        public function class_add(Request $request)
        {
            return view('wechat/class_add');
            
        }



            //"你好"   回复 "你好"
        // if($xml_arr['MsgType'] == 'text' && $xml_arr['Content'] == '你好'){
        //     $wechat_user = $this->tools->get_wechat_user($xml_arr['FromUserName']);
        //     $msg = '我好你也好';
        //     echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";
        // }
        // 
            //签到
        // if($xml_arr['MsgType'] == 'event' && $xml_arr['Event'] == 'CLICK' && $xml_arr['EventKey'] == 'sign'){
        //     //签到
        //     //判断是否签到
        //     $usere_wechat = UserWechat::where(['openid'=>$xml_arr['FromUserName']])->first();
        //     $today = date('Y-m-d',time()); //今天
        //     $last_day = date('Y-m-d',strtotime("-1 days")); //昨天
        //     if($usere_wechat->sign_day == $today){
        //         //已经签到
        //         $msg = '您已签到';
        //         echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";
        //     }else{
        //         //根据签到次数加积分
        //         //连续签到
        //         if($usere_wechat->sign_day == $last_day){
        //             //连续签到
        //             $sign_num = $usere_wechat->sign_num + 1;
        //             if($sign_num >= 6){
        //                 $sign_num = 1;
        //             }
        //             UserWechat::where(['openid'=>$xml_arr['FromUserName']])->update([
        //                 'sign_day'=>$today,
        //                 'sign_num'=>$sign_num,
        //                 'sign_score'=>$usere_wechat->sign_score + 5 * $sign_num
        //             ]);
        //         }else{
        //             //非连续签到
        //             UserWechat::where(['openid'=>$xml_arr['FromUserName']])->update([
        //                 'sign_day'=>$today,
        //                 'sign_num'=>1,
        //                 'sign_score'=>$usere_wechat->sign_score + 5
        //                 ]);
        //         }
        //         $msg = '签到成功';
        //         echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";
 
        //         }
        //     }
        // }
}
            
        
