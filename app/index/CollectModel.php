<?php

namespace App\index;

use Illuminate\Database\Eloquent\Model;

class CollectModel extends Model
{
    protected $table = 'shop_collect';
	 protected $primaryKey="c_id";
	 public $timestamps = false;
	 protected $guarded = [];
}
