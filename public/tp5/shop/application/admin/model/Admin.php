<?php

namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    protected $pk = 'admin_id';
    //设置当前模型对应的完整的数据库名，写上这个不会错
    protected $table = 'shop_admin';

    public function setAdminPwdAttr($value){
		  return md5($value);
	}
}
