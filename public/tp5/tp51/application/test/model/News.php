<?php

namespace app\test\model;

use think\Model;

class News extends Model
{
	public $pk='id';
    protected $autoWriteTimestamp = true;
}
