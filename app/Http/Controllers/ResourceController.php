<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\Tools;
use App\wechat\ResourceModel;
class ResourceController extends Controller
{
	public $tools;
    public $request;
    public function __construct(Tools $tools,Request $request)
    {
        $this->tools=$tools;
        $this->request=$request;
    }
    public function upload()
    {
    	return view('/resource/upload');
    }
    public function do_upload(Request $request)
    {
    	$all=$request->all();
    	$type_arr=['image'=>1,'voice'=>2,'video'=>3];
    	$type=$all['type'];
    	if(!$this->request->hasFile('rsource')){
    		dd('没有文件');
    	};
    	$file_obj = $this->request->file('rsource');
    	$file_ext = $file_obj->getClientOriginalExtension();
    	$file_name = time().rand(1000,9999).'.'.$file_ext;

    	$path = $this->request->file('rsource')->storeAs('/wechat'.$type,$file_name);
    	$url='https://api.weixin.qq.com/cgi-bin/material/add_material?access_token='.$this->tools->get_access_token().'&type='.$type;

    	$data = [
    		'media'=>new \CURLFile(storage_path('app/public/'.$path)),
    	];
    	if($type=='video'){
    		$data['description']=[
    			'title'=>'标题',
    			'introduction'=>'描述'
    		];
    	}
    	$re=$this->tools->wechat_curl_file($url,json_encode($data));

    	$result=json_decode($re,1);
        // dd($result);
    	if(!isset($result['errcode'])){
    		ResourceModel::create([
    			'meida_id'=>$result['media_id'],
    			'type'=>$type,
    			'path'=>'/storage/'.$path,
    			'addtime'=>time()
    		]);
    	}
    	// dd($result);2
    }
    //素材列表123
    public function source_list()
    {
    	// $url='https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token='.$this->tools->get_access_token();
    	// $data = [
    	// 	'type'=>"image",
    	// 	'offset'=>0,
    	// 	'count'=>10
    	// ];
    	// $re=$this->tools->curl_post($url,$data);
    	// $result=json_decode($re,1);
    	// dd($result);
    	$list=ResourceModel::get();
    	return view('wecha/resource',['list'=>$list]);

    }


    //自定义菜单
    public function menu()
    {
        $url='https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$this->tools->get_access_token();
        $data= [
                "button"=>[
                    [  
                         "type"=>"click",
                        "name"=>"今日歌曲",
                        "key"=>"V1001_TODAY_MUSIC"
                    ],
                    [
                       "name"=>"菜单",
                       "sub_button"=>[
                       [    
                           "type"=>"view",
                           "name"=>"搜索",
                           "url"=>"http://www.soso.com/"
                        ],
                        [
                           "type"=>"click",
                           "name"=>"赞一下我们",
                           "key"=>"V1001_GOOD"
                        ]]
                   ]]
            ];
            $re=$this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
            dump($re);
    }
}
