<?php

namespace app\index\model;

use think\Model;

class Car extends Model
{
    protected $pk='c_id';
    public static function getMoney($goods_id,$user_id)
    {
    	$sql="select SUM(by_number * shop_price) as total from car where goods_id in ($goods_id) and user_id=$user_id";
    	//query 如果查询非法或不正确返回false  否则返回查询结果集
    	$total=\Db::query($sql);
    	// dump($total);
    	// return $total;
    	return $total[0]['total']??0;
    }
}
