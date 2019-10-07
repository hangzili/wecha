<?php

namespace app\admin\model;

use think\Model;
use think\model\concern\SoftDelete;
class Abs extends Model
{
      use SoftDelete;       
      protected	$autoWriteTimestamp	=	true; 
       public function getSexAttr($value)
   {
   		$is=['女','男'];
   		return $is[$value];
   }
}
