<?php

namespace App\wechat;

use Illuminate\Database\Eloquent\Model;

class UserwechaModel extends Model
{
    protected $table = 'user_wachat';
	protected $primaryKey="id";
	public $timestamps = false;
	protected $guarded = [];
}
