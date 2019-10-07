<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\ArticleModel;
use Illuminate\Support\Facades\Cache;
class IndexController extends Controller
{
    //展示
    public function index(Request $request)
    { 
        $p=$request->input('page') ?? 1;
        $list = Cache::get('list-'.$p);
        if(!$list){
            $list=ArticleModel::orderBy('id','desc')->paginate(3);
            Cache::put('list-'.$p,$list,30);
            dd('从数据库里面得到');
        }
        dd('从缓存里面得到');
    	
    	return view('index',['list'=>$list]);
    }
    //添加
    public function add(Request $request)
    {
    	if($request->isMethod('POST')){
    		
    		$request->validate([
		        'title' => 'required',
		        'author' => 'required',
		    ],
			["title"=>"required 不能为空","author"=>"required 不能为空"],
			['title'=>'标题','author'=>'作者']);
    		$path=null;
    		if($request->hasFile('img') && $request->file('img')->isValid()){
    			$path = $request->file('img')->store('public');
    			// $path=Storage::putFile('img',$request->file('img'));
    		}
			$data=request()->all();
				// dd($request->file('img'));
			
			$data['img'] = strstr($path,'/');
				// dd($path);
			$article=ArticleModel::create($data);
			if($article){
				session()->flash('status',"添加成，文章id为".$article->id);
				return redirect('/');
			}

    	}
    	return view('/add');
    }
    //删除
    public function del(Request $request)
    {
    	$id=$request->all();
    	$res=ArticleModel::find($id['id'])->delete();
    	if($res){
    		return redirect('/');
    	}
    }
}
