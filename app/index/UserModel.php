<?php

namespace App\index;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'index_user';
	 protected $primaryKey="u_id";
	 public $timestamps = false;
	 protected $fillable = ['email','pwd'];
}
