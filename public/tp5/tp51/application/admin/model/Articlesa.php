<?php

namespace app\admin\model;

use think\Model;
class Articlesa extends Model
{
	public $pk='id';
    protected $autoWriteTimestamp  = true;
   //  public function getCidAttr($value)
   // {
   // 		$is=['国际新闻','社会新闻','娱乐新闻'];
   // 		return $is[$value];
   // }

}
