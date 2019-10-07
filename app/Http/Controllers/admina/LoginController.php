<?php

namespace App\Http\Controllers\admina;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\UserModel;
class LoginController extends Controller
{
    public function login()
    {
    	return view('/admina/login/login');
    }
    //登陆页面
    public function logindo(Request $request)
    {
    	$all = $request->except('_token');
    	$username=$all['username'];
    	$pwd=$all['pwd'];
    	$res=UserModel::where('username',$username)->first();
    	if($res['username']!=$username){
    		return redirect('/');exit;
    	}
    	if($res['pwd']!=$pwd){
    		return redirect('/');exit;
    	}
    	session()->put('usersession',$username);
    	return redirect('/index');
    }
}
