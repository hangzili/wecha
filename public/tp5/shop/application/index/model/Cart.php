<?php

namespace app\index\model;

use think\Model;

class Cart extends Model
{
    protected $pk = 'c_id';
    protected $table='shop_cart';
    public function getTotal($goods_id,$user_id)
    {
    	$sql="select g.goods_price * c.by_number from shop_goods as g join shop_cart c on g.goods_id=c.goods_id where g.goods_id in ($goods_id) and c.user_id=$user_id"; 
    	$result=\Db::query($sql);
    	// dump($result);
    	return $result[0]['g.goods_price * c.by_number'];
    }
    public function getByNumbe($goods_id,$user_id)
    {
    	return self::where(['goods_id'=>$goods_id,'user_id'=>$user_id])->value('by_number');
    }
}
