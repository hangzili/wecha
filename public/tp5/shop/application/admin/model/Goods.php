<?php

namespace app\admin\model;

use think\Model;

class Goods extends Model
{
    protected $pk = 'goods_id';
    //设置当前模型对应的完整的数据库名，写上这个不会错
    protected $table = 'shop_goods';
    public function setAdminPwdAttr($value){
        return md5($value);
  }
}
