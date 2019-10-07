<?php

namespace app\kaoshi\model;

use think\Model;

class Student extends Model
{
    public function getSexAttr($value)
    {
    	$sex=['女','男'];
    	return $sex[$value];
    }
}
