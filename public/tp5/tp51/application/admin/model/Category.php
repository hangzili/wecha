<?php

namespace app\admin\model;

use think\Model;

class Category extends Model
{
   public $pk='id';
   protected $autoWriteTimestamp  = true;
   //获取器
   public function getIsNavAttr($value)
   {
   		$is=['是','否'];
   		return $is[$value];
   }
}


            // {eq name="v.state" value="1"}
            //   tr.append("<td align='center'>普通管理员</td>");
            // {else/}
            //   tr.append("<td align='center'>超级管理员</td>");
            // {/eq}
