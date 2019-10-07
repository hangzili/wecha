<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class CateModel extends Model
{
    protected $table = 'shop_category';
	 protected $primaryKey="cate_id";
	 public $timestamps = false;
	 protected $guarded = [];
}
