<?php

namespace App\index;

use Illuminate\Database\Eloquent\Model;

class ClassifyModel extends Model
{
    protected $table = 'shop_category';
	 protected $primaryKey="cate_id";
	 public $timestamps = false;
	 protected $guarded = [];
}
