<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginSuccess;
use App\Jobs\SendEmail;
class UserController extends Controller
{
    protected $subject="邮件主题";
    //发送邮件
    public function send(Request $request)
    {
        // Mail::to($request->user())->send(new LoginSuccess($request->user()->name,"西北玄天一片云"));
        

        // Mail::raw('欢迎进入我的博客',function($message){
        //     $message->to('2643235254@qq.com');
        //     $message->subject("这是一封测试邮件");
        // });
        
    	// $this->dispatch(new SendEmail($request->user(),"这是队列测试","星期天"));
        
        //队列添加的
        Mail::to($request->user())->queue(new LoginSuccess($request->user()->name,"今天天气很棒喽！"));


        return '邮件发送成功';
    }
}
