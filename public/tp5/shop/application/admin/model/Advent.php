<?php

namespace app\admin\model;

use think\Model;

class Advent extends Model
{
    protected $pk = 'a_id';
    //设置当前模型对应的完整的数据库名，写上这个不会错
    protected $table = 'shop_advert';
}
