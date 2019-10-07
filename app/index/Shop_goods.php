<?php

namespace App\index;

use Illuminate\Database\Eloquent\Model;

class Shop_goods extends Model
{
     protected $table = 'shop_goods';
	 protected $primaryKey="goods_id";
	 public $timestamps = false;
	 protected $guarded = [];
}
