<?php

namespace app\test\model;

use think\Model;

class Students extends Model
{
    	protected	$autoWriteTimestamp	=	true; 
    	 public function getSexAttr($value)
   {
   		$is=['女','男'];
   		return $is[$value];
   }
    public function getHobbyAttr($value)
   {
   		$is=['国际新闻','社会新闻','娱乐新闻'];
   		return $is[$value];
   }
   // public function getTagIdsAttr($value)
  	//  {
  	//  	$tags= db()->name('labei')->where('id','in',$value)->column('username');
  	//  	return implode(',',$tags);
  	//  }
}
