<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\Tools;
class EventController extends Controller
{
	public $tools;
    public $request;
    public function __construct($tools,$request)
    {
        $this->tools=$tools;
        $this->request=$request;
    }

    public function event()
    {
    	echo storage_path();
    	dd();
    	// echo $_GET['echostr'];
    }
}