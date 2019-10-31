<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\Tools;
use App\wechat\UserwechaModel as UserWechat;
use App\wechat\ClassModel;
use App\Console\Kernel;
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
    //接受消息，回消息
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
            //关注之后回消息
        if($xml_arr['MsgType'] == 'event' && $xml_arr['Event'] == 'subscribe'){
            $wechat_user = $this->tools->get_wechat_user($xml_arr['FromUserName']);
            $msg = '您好，'.$wechat_user['nickname'].'帅哥。欢迎关注我的公众号';
            echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";
        }
        if($xml_arr['MsgType'] == 'text' && $xml_arr['Content'] == '1'){
            $wechat_user = $this->tools->get_wechat_user($xml_arr['FromUserName']);
            $msg = '白伟';
            echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";
        }
        //回复图片消息
        if($xml_arr['MsgType'] == 'text' && $xml_arr['Content'] == '2'){

//            $msg = 'www.a.cn/storage/wechat/image/15712324757034.jpg';
//            echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName><FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[".$msg."]]></Content></xml>";
            echo "<xml>
                  <ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName>
                  <FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName>
                  <CreateTime>".time()."</CreateTime>
                  <MsgType><![CDATA[image]]></MsgType>
                  <Image>
                    <MediaId><![CDATA[1]]></MediaId>
                  </Image>
                </xml>";
        }


    }
    //添加菜单
    public function bran_add()
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$this->tools->get_access_token();
        $data = [
            "button"=>[
                [
                    "type"=>"click",
                    "name"=>"查天气",
                    "key"=>"V1001_TODAY_MUSIC"
                ],
                        [
                            "type"=>"view",
                            "name"=>"个人中心",
                            "url"=>"http://47.94.20.198/wecha/login"
                        ]
                        ]
        ];
        $re=$this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
        dump($re);
    }
    //天气
    public function tianqi()
    {
        $url = 'http://api.k780.com/?app=weather.today&weaid=1&appkey=c9aff0e9b9ed0b07cf225c6c6b93df37&sign=d0718ce33311c00082b84ccc78399ffe&format=json';
        $re = $this->tools->curl_get($url);
        $result = json_decode($re,1);
        dump($result);
    }
    //我要表白  表白添加页面
//    public function kess_add()
//    {
//        return view('wecha/kess_add');
//    }


    //点击管理后判断是否有课程
//    public function guanli()
//    {
//        $list = ClassModel::count();
//        // dump($list);die;
//        // dd($list);
//        if($list == 0){
//            //Ìí¼Ó
//            return view('wechat/class_add');
//        }else{
//            //ÐÞ¸Ä
//            $list = ClassModel::get()->toArray();
//            $list = $list[0];
//            // dd($list);
//            return view('wechat/class_update',['list'=>$list]);
//        }
//    }
//    //课程添加执行页面
//    public function class_add_do(Request $request)
//    {
//        $all = $request->all();
//        $res = ClassModel::create($all);
//    }
//    //课程修改执行页面
//    public function class_update_do(Request $request)
//    {
//        $all = $request->except('_token');
//        $res = ClassModel::where(['id'=>'4'])->update($all);
//    }




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


