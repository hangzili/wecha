<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';
	 protected $primaryKey="id";
	 public $timestamps = false;
	 protected $guarded = [];
}
