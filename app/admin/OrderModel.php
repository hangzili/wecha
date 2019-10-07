<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'order';
	 protected $primaryKey="id";
	 public $timestamps = false;
	 protected $guarded = [];
}
