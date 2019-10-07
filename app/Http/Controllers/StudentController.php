<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\model\StudentModel;
class StudentController extends Controller
{
	//添加
    public function add(Request $request)
    {
      // 	if($request->isMethod('POST')){
    		// 	$all = $request->all();
      //     $model= new StudentModel();
      //     $res=$model->create($all);
    		// 	if($res){
    		// 		return redirect("/index");
    		// 	}
  			 // return redirect()->back();
  		  // }
        $validatedData = $request->validate([
          's_naem' => 'nullable',
          's_age' => 'nullable',
        ]);
        // dump($validatedData);

      	return view('student/add');
        
    }
    //展示
    public function index(Request $request)
    {
    	// echo 2;
    	$all = $request->all();
      $quesps=request()->input();
    	$where=[];
    	if(!empty($all['s_name'])){
    		$where[]=['s_name','=',$all['s_name']];
    	}
    	if(!empty($all['s_sex'])){
    		$where[]=['s_sex','=',$all['s_sex']];
    	}
    	if(!empty($all['s_age'])){
    		$where[]=['s_age','=',$all['s_age']];
    	}
        $model= new StudentModel();
    	if(!empty($all['s_rule'])){
    		$res =   $model
                ->where($where)
                ->orderBy($all['s_sort'],$all['s_rule'])
                ->paginate(2);
    	}else{
    		$res = $model
                ->where($where)
                ->paginate(2);
    	}
    	
    	
    	
    	return view('student/index',compact('res','quesps'));

    }
    //修改
    public function update(Request $request)
    {
    	$all = $request->all();
    	$s_id=$all['s_id'];
      $res=StudentModel::find($s_id);
    	return view('student/update',['res'=>$res]);
    }
    //修改执行
    public function updated(Request $request)
    {
    	$all = $request->all();
      $res=StudentModel::find($all['s_id'])->update($all);
   		if($res){
   			return redirect("/index");
   		}
    }
    //删除
   	public function delete(Request $request)
   	{
   		$all = $request->all();
      $res=StudentModel::find($all['s_id'])->delete();
   		if($res){
   			return redirect("/index");
   		}
   	}
   	//批量删除
   	public function allDel(Request $request)
   	{
   		$all = $request->all();
      $s_id=explode(',',$all['s_id']);
      $res=StudentModel::whereIn('s_id',$s_id)->delete();
   		return redirect("/index");
   	}
    //模型
    public function model()
    {
      $model= new StudentModel();
      $res=$model->get();
      dd($res);
    }
}
