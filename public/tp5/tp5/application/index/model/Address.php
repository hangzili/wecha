<?php

namespace app\index\model;

use think\Model;

class Address extends Model
{
    protected $pk="region_id";
    //地址
   public static function getaddressname($goods_id)
   {
        $name=self::where('region_id',$goods_id)->value('region_name');
        return $name;
   }
}
