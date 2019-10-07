<?php

namespace app\index\model;

use think\Model;

class Position extends Model
{
    protected $pk = 'p_id';
    //设置当前模型对应的完整的数据库名，写上这个不会错
    protected $table = 'shop_position';

}
