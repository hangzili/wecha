<?php

namespace App\index;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    protected $table = 'shop_cart';
	 protected $primaryKey="c_id";
	 public $timestamps = false;
	 protected $guarded = [];
}
