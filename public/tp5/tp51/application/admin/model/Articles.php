<?php

namespace app\admin\model;

use think\Model;
use think\model\concern\SoftDelete;

class Articles extends Model
{
      use SoftDelete;       
      protected $deleteTime = 'delete_time';  
     public $pk='id';
  	 protected $autoWriteTimestamp  = true;
  	 //修改器
  	 public function setTagIdsAttr($value)
  	 {
  	 	return implode(',',$value);
  	 }
  	 //验证器
  	 public function getTagIdsAttr($value)
  	 {
  	 	$tags= db()->name('labei')->where('id','in',$value)->column('username');
  	 	return implode(',',$tags);
  	 }
}
