<?php

namespace App\Http\Controllers\admina;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
   public function index()
    {
    	return view('/admina/index/index');
    }
    public function main()
    {
    	return view('/admina/index/main');
    }
    public function menu()
    {
    	return view('/admina/index/menu');
    }
    public function top()
    {
    	return view('/admina/index/top');
    }
}
