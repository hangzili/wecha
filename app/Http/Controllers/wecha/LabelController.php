<?php

namespace App\Http\Controllers\wecha;
use App\Http\Controllers\WechaController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabelController extends Controller
{
	//标签展示
    public function label_list()
    {
    	$token= new WechaController;
    	$access_token=$token->wechat_access_token();
    	$url='https://api.weixin.qq.com/cgi-bin/tags/get?access_token='.$access_token;
    	$url1=$this->get($url);
    	$url2=json_decode($url1,1);
    	// dd($url2);
    	return view('/wecha/label_list',['list'=>$url2['tags']]);
    }
    //标签添加
    public function label_add()
    {
    	return view('/wecha/label_add');
    }
    //添加执行
    public function label_add_do(Request $request)
    {
    	$all=$request->all();
    	$token= new WechaController;
    	$access_token=$token->wechat_access_token();
    	$url='https://api.weixin.qq.com/cgi-bin/tags/create?access_token='.$access_token;
    	// $url=json_decode($url,1);
    	$data=[   
    		"tag" =>[     
    			"name" => $all['label_name']
    	   ]
    	];
    	$re=$this->post($url,json_encode($data));
    	$res=json_decode($re,1);
    	dump($res);
    }
    //标签删除
    public function delete(Request $request)
    {
    	$all=$request->all();
    	// dd($all['id']);
    	$token= new WechaController;
    	$access_token=$token->wechat_access_token();
    	$url='https://api.weixin.qq.com/cgi-bin/tags/delete?access_token='.$access_token;
    	$data=[   
    		"tag" =>[     
    			"id" => $all['id']
    	   ]
    	];
    	$re=$this->post($url,json_encode($data));
    	$del=json_decode($re,1);
    	dump($del);
    }
    //标签修改
    public function update(Request $request)
    {
    	$all=$request->all();
    	return view('/wecha/updat',['all'=>$all]);
    }
    //标签修改执行
    public function updat_do(Request $request)
    {
    	$all=$request->all();
    	$token= new WechaController;
    	$access_token=$token->wechat_access_token();
    	$url='https://api.weixin.qq.com/cgi-bin/tags/update?access_token='.$access_token;
    	$data=[   
    		"tag" =>[     
    			"id" => $all['id'],
    			"name" => $all['name']
    	   ]
    	];
    	$re=$this->post($url,json_encode($data));
    	$upd=json_decode($re,1);
    	dump($upd);	
    }
    //给用户打标签
    public function wechat(Request $request)
    {
    	$all=$request->all();
    	$token= new WechaController;
    	$access_token=$token->wechat_access_token();
    	// $url='https://api.weixin.qq.com/cgi-bin/user/tag/get?access_token='.$access_token.'&next_openid=';
    	// $data=[
    	// 	'tagid'=>$all['id'],
    	// 	'next_openid'=>''
    	// ];
    	// $url1=$this->post($url,$data);
    	// // dd($url1);
    	// $list=json_decode($url1,1);
    	// dd($list);
    	$url='https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$access_token.'&next_openid=';
    	$url1=$this->get($url);
    	// dd($url1);
    	$list=json_decode($url1,1);
    	// dd($list);
    	return view('/wecha/wechat',['list'=>$list['data']['openid'],'id'=>$all['id']]);
    }
    //批量为用户取消标签
    public function add_user_tag(Request $request)
    {
    	$all=$request->all();
    	$token= new WechaController;
    	$access_token=$token->wechat_access_token();
    	$url='https://api.weixin.qq.com/cgi-bin/tags/members/batchtagging?access_token='.$access_token;
    	$data=[
    		'tagid'=>$all['id'],
    		'openid_list'=>$all['openid_list']
    	];
		$re=$this->post($url,json_encode($data));
    	$list=json_decode($re,1);
    	dump($list);
    }
    //获取用户的标签
    public function add_user_list(Request $request)
    {
    	$all=$request->all();
    	$token= new WechaController;
    	$access_token=$token->wechat_access_token();
    	$url='https://api.weixin.qq.com/cgi-bin/tags/getidlist?access_token='.$access_token;
    	$data=[
    		'openid'=>$all['id']
    	];
		$re=$this->post($url,json_encode($data));
    	$list=json_decode($re,1);
    	dump($list);
    }















    //git提交
    public function get($url)
    {
        // $url='https://www.baidu.com';
        $curl=curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        $result=curl_exec($curl);
        // var_dump($result);
        curl_close($curl);
        return $result;
    }
    //post提交
    public function post($url,$post_data)
    {
        // $url='http://www.baidu.com';
        $curl=curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
        $result=curl_exec($curl);
        curl_close($curl);
        return $result;
    }
}
