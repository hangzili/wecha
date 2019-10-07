<?php

namespace app\index\model;

use think\Model;

class Goods extends Model
{
    protected $pk = 'goods_id';
    protected $table='shop_goods';
    public static function getPrice($goods_id)
    {
    	return self::where('goods_id',$goods_id)->value('goods_price'); 
    }
}
