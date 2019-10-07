<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
    	// session()->put('username','123456');
    	// session(['username'=>['username'=>'123','password'=>'321']]);
    	// return view('view/index',['res'=>'213']);
    }
    public function child()
    {
    	// $res=session()->get('username');
    	// $res=session('username');
    	// $res=session()->forget('key');
    	// dump($res);
    	// return view('view/child');
    }
}
