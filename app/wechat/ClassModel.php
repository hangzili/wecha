<?php

namespace App\wechat;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'wecha_class';
	protected $primaryKey="id";
	public $timestamps = false;
	protected $guarded = [];
}
