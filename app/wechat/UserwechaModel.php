<?php

namespace App\wechat;

use Illuminate\Database\Eloquent\Model;

class UserwechaModel extends Model
{
    protected $table = 'user_wechat';
	protected $primaryKey="id";
	public $timestamps = false;
	protected $fillable=['openid','uid','sign_num','sign_day','sign_score'];

}
