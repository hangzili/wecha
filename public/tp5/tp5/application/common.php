<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function createTree($data,$parent_id=0,$level=0){
	//定义一个数组
	static $new_arr=[];
	//遍历数据一条条比对
	foreach($data as $k=>$v){
		//找对应的下级
		if($v['parent_id']==$parent_id){
			$v['level']=$level;
			//找到之后放到数组里面
			$new_arr[]=$v;
			//调用程序递归找子集
			createTree($data,$v['cat_id'],$level+1);
		}
	}
	return $new_arr;
}
function createTreeBySon($data,$parent_id=0)
{
	$new_arr=[];
	foreach($data as $k=>$v)
	{
		if($v['parent_id']==$parent_id)
		{
			$new_arr[$k]=$v;
			$new_arr[$k]['son']=createTreeBySon($data,$v['cat_id']);
		}
	}
	return $new_arr;
}