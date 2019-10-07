<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Users;
class LoginController extends Controller
{
   // public function login()
   //  {
   //  	return view('Login/Login');
   //  }
   //  public function logindo(Request $request)
   //  {
       
   //  	$all=$request->all();
   //  	$model= new Users();
   //    	$res=$model->create($all);
   //    	if($res){
   //    		return view('/Login/register');
   //    	}
   //  }
   //  public function register()
   //  {
   //  	return view('login/register');
   //  }
   //  public function registerdo(Request $request)
   //  {
   //  	$all=$request->all();
   //  	$username=$all['username'];
   //  	$userpwd=$all['userpwd'];
   //  	$model= new Users();
   //  	$res=Users::where('username',$username)->first();
   //      dd($res);
   //  	// if($res['username']!=$username){
   //  	// 	//用户名不对
   //  	// 	echo '用户名不对';exit;
   //  	// }
   //  	// if($res['userpwd']!=$userpwd){
   //  	// 	echo '密码不对';exit;
   //  	// }
   //  	// session()->put('key',$res);
   //  	// echo '登陆成功';die;
   //  }
}
