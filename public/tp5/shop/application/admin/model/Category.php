<?php

namespace app\admin\model;

use think\Model;

class Category extends Model
{
    protected $pk = 'cate_id';
    //设置当前模型对应的完整的数据库名，写上这个不会错
    protected $table = 'shop_category';
}
