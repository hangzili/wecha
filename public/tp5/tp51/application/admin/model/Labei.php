<?php

namespace app\admin\model;

use think\Model;

class Labei extends Model
{
   public $pk='id';
   protected $autoWriteTimestamp  = true;
   public function getIsNavAttr($value)
   {
   		$is=['是','否'];
   		return $is[$value];
   }
}
