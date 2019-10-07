<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\facade\Session;
	class Base extends Controller
	{

	//利用session判断是否非法登陆
    public function __construct(){
    parent::__construct();
        if(!Session::has('username')){
          $this->redirect('Login/login');
        }
        $this->view->engine->layout(false);
 	}
		
    public function upload($files){
	    // 获取表单上传文件 例如上传了001.jpg
	    $file = request()->file($files);
	    // 移动到框架应用根目录/uploads/ 目录下
	    $info = $file->move( 'uploads');
	    if($info){
	            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
	            return '/uploads/'.$info->getSaveName();
	        }else{
	            // 上传失败获取错误信息
	            return $file->getError();
	    }
	}
	public function uploa(){
		// 获取表单上传文件
		$files = request()->file('img_url');
			$imgArr=[];
			foreach($files as $file){
			// 移动到框架应用根目录/uploads/ 目录下
			$info = $file->move( 'uploads');
				if($info){
					// 成功上传后 获取上传信息
					// 输出 jpg
					$imgArr[]= '/uploads/'.$info->getSaveName();
				}else{
					// 上传失败获取错误信息
					return $file->getError();
				}
			}
		return $imgArr;	
	}

	
}

