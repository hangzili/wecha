<?php 
	function getClass($data,$parent_id=0){
		static $arr=[];
		foreach($data as $k=>$v) {
			if($v['parent_id']==$parent_id){
				$arr[]=$v;
				getClass($data,$v['cate_id']);
			}
		}
		return $arr;
	}
	function getClasss($data,$parent_id=0,$num=0){
		static $arr=[];
		foreach($data as $k=>$v) {
			if($v['parent_id']==$parent_id){
				$v['num']=$num;
				$arr[]=$v;
				getClasss($data,$v['cate_id'],$num+1);
			}
		}
		return $arr;
	}


 ?>