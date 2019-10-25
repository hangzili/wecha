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
    //
    public function event()
    {
    		//
    	$info = file_get_contents("php://input");
    		//
        file_put_contents(storage_path('logs/wechat/'.date('Y-m-d').'.log'),"<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n",FILE_APPEND);
        file_put_contents(storage_path('logs/wechat/'.date('Y-m-d').'.log'),$info,FILE_APPEND);
        	//
        $xml_obj = simplexml_load_string($info,'SimpleXMLElement',LIBXML_NOCDATA);
        	//
        $xml_arr = (array)$xml_obj;
            //
        if($xml_arr['MsgType'] == 'event' && $xml_arr['Event'] == 'subscribe'){
            $wechat_user = $this->tools->get_wechat_user($xml_arr['FromUserName']);
            $msg = '»¶Ó­'.$wechat_user['nickname'].'Í¬Ñ§½øÈëÑ¡¿ÎÏµÍ³£¡';
            echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";
            //获取用户基本信息

            $list=file_get_contents('https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->tools->get_access_token().'&openid='.$xml_arr['FromUserName'].'&lang=zh_CN');
            $results=json_decode($list,1);

        }


    }

    //点击管理后判断是否有课程
    public function guanli()
    {
        $list = ClassModel::count();
        // dump($list);die;
        // dd($list);
        if($list == 0){
            //Ìí¼Ó
            return view('wechat/class_add');
        }else{
            //ÐÞ¸Ä
            $list = ClassModel::get()->toArray();
            $list = $list[0];
            // dd($list);
            return view('wechat/class_update',['list'=>$list]);
        }
    }
    //课程添加执行页面
    public function class_add_do(Request $request)
    {
        $all = $request->all();
        $res = ClassModel::create($all);
    }
    //课程修改执行页面
    public function class_update_do(Request $request)
    {
        $all = $request->except('_token');
        $res = ClassModel::where(['id'=>'4'])->update($all);
    }




            //签到
        // if($xml_arr['MsgType'] == 'text' && $xml_arr['Content'] == 'ÄãºÃ'){
        //     $wechat_user = $this->tools->get_wechat_user($xml_arr['FromUserName']);
        //     $msg = 'ÎÒºÃÄãÒ²ºÃ';
        //     echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";
        // }
        //
            //Ç©µ½
        // if($xml_arr['MsgType'] == 'event' && $xml_arr['Event'] == 'CLICK' && $xml_arr['EventKey'] == 'sign'){
        //     //Ç©µ½
        //     //ÅÐ¶ÏÊÇ·ñÇ©µ½
        //     $usere_wechat = UserWechat::where(['openid'=>$xml_arr['FromUserName']])->first();
        //     $today = date('Y-m-d',time()); //½ñÌì
        //     $last_day = date('Y-m-d',strtotime("-1 days")); //×òÌì
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
        //         $msg = '你已签到';
        //         echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";

        //         }
        //     }
        // }
}


