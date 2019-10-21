<?php

namespace App\wechat;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    protected $table = 'menu_list';
	protected $primaryKey="id";
	public $timestamps = false;
	protected $guarded = [];
}
