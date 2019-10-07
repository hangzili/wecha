<?php

namespace app\index\model;

use think\Model;

class Area extends Model
{
    protected $pk = 'id';
    protected $table='shop_area';
    public static function getaddarea($id)
    {
    	return self::where('id',$id)->value('name');
    }
}
